<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Company;
use Carbon\Carbon;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil untuk pengguna yang sedang login.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user()->load('company');

        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'nullable|string|max:20',
        ]);

        $user->name = $request->input('name');
        $user->mobile = $request->input('mobile');
        $user->save();

        if ($user->company) {
            $user->company->update([
                // Update company fields here if needed
            ]);
        }

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
