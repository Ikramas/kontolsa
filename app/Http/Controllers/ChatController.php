<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PersonalMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Events\MessageSent;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    /**
     * Menampilkan halaman komunikasi anggota.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        // Ambil semua pengguna kecuali pengguna yang sedang login.
        // PENTING: Sekarang kita akan juga mengambil public_id dari user lain.
        $members = User::where('id', '!=', $user->id)
                        ->where('role', 'member')
                        ->with('company')
                        ->select('id', 'name', 'public_id') // Pastikan public_id diambil
                        ->get();

        return view('chat', compact('user', 'members'));
    }

    /**
     * Mengambil riwayat pesan pribadi antara dua pengguna dengan pagination.
     * Endpoint ini sekarang menerima UUID publik user lain.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $userPublicId // INI ADALAH UUID PUBLIK USER LAIN
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPersonalMessages(Request $request, string $userPublicId) // Type hint as string
    {
        $loggedInUser = Auth::user();

        // Temukan user lain berdasarkan public_id mereka.
        $otherUser = User::where('public_id', $userPublicId)->firstOrFail();

        $perPage = 50; 
        $page = $request->query('page', 1); 

        $query = PersonalMessage::where(function ($q) use ($loggedInUser, $otherUser) {
            // Gunakan ID internal untuk query database
            $q->where('sender_id', $loggedInUser->id)
              ->where('receiver_id', $otherUser->id);
        })->orWhere(function ($q) use ($loggedInUser, $otherUser) {
            $q->where('sender_id', $otherUser->id)
              ->where('receiver_id', $loggedInUser->id);
        });

        $totalMessages = $query->count();
        $startIndex = max(0, $totalMessages - ($page * $perPage));

        $messages = $query->orderBy('created_at', 'asc')
                          ->skip($startIndex)
                          ->take($perPage)
                          ->with(['sender', 'receiver'])
                          ->get();

        // Tandai pesan yang diterima sebagai sudah dibaca
        PersonalMessage::where('sender_id', $otherUser->id)
                       ->where('receiver_id', $loggedInUser->id)
                       ->where('is_read', false)
                       ->update(['is_read' => true]);

        return response()->json([
            'messages' => $messages, 
            'current_page' => $page,
            'per_page' => $perPage,
            'total_messages' => $totalMessages,
            'has_more_pages' => ($startIndex > 0)
        ]);
    }

    /**
     * Mengirim pesan pribadi.
     * Sekarang menerima public_id dari receiver dari frontend.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendPersonalMessage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'receiver_public_id' => 'required|exists:users,public_id', // Gunakan public_id
            'message' => 'required|string|max:5000',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $loggedInUser = Auth::user();
        // Temukan user penerima berdasarkan public_id mereka
        $receiverUser = User::where('public_id', $request->receiver_public_id)->firstOrFail();

        DB::beginTransaction();
        try {
            $message = PersonalMessage::create([
                'sender_id' => $loggedInUser->id, // Tetap gunakan ID internal di sini
                'receiver_id' => $receiverUser->id, // Tetap gunakan ID internal di sini
                'message' => $request->message,
                'is_read' => false, 
            ]);

            $message->load(['sender', 'receiver']);

            broadcast(new MessageSent($message))->toOthers();

            DB::commit();

            return response()->json(['success' => true, 'message' => $message]);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error sending message: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to send message.'], 500);
        }
    }
}