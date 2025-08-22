<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class AdminController extends Controller
{
    /**
     * Dashboard Admin dengan:
     * - Filter rentang tanggal (preset & custom)
     * - Metrik total (users, members, companies, transactions, pending)
     * - Revenue (SUM amount transaksi paid)
     * - Time-series harian untuk chart
     * - Caching
     */
    public function dashboard(Request $request): View
    {
        $preset = $request->string('preset')->toString();
        $start  = $request->date('start_date');
        $end    = $request->date('end_date');

        [$startDate, $endDate] = $this->resolveDateRange($preset, $start, $end);
        $rangeKey = $startDate->format('Ymd') . '_' . $endDate->format('Ymd');

        $cacheTtlSeconds = 60;
        $cacheKey = "admin_dashboard_v1:{$rangeKey}";

        $data = Cache::remember($cacheKey, $cacheTtlSeconds, function () use ($startDate, $endDate) {

            $totalUsers        = User::count();
            $totalMembers      = User::where('role', 'member')->count();
            $totalCompanies    = Company::count();
            $totalTransactions = Transaction::count();
            $pendingTransactions = Transaction::where('status', 'pending')->count();

            $revenue = Transaction::where('status', 'paid')
                ->whereBetween('created_at', [$startDate->copy()->startOfDay(), $endDate->copy()->endOfDay()])
                ->sum('amount');

            $series = DB::table('transactions')
                ->selectRaw('DATE(created_at) as d, COUNT(*) as tx_count, SUM(CASE WHEN status = "paid" THEN amount ELSE 0 END) as paid_amount')
                ->whereBetween('created_at', [$startDate->copy()->startOfDay(), $endDate->copy()->endOfDay()])
                ->groupBy('d')
                ->orderBy('d')
                ->get()
                ->keyBy('d');

            $period = CarbonPeriod::create($startDate->copy()->startOfDay(), '1 day', $endDate->copy()->startOfDay());
            $chartLabels = [];
            $chartTxCount = [];
            $chartRevenue = [];

            foreach ($period as $day) {
                $key = $day->format('Y-m-d');
                $chartLabels[] = $day->format('d M');
                $chartTxCount[] = isset($series[$key]) ? (int)$series[$key]->tx_count : 0;
                $chartRevenue[] = isset($series[$key]) ? (float)$series[$key]->paid_amount : 0.0;
            }

            $recentTransactions = Transaction::with(['user:id,name', 'company:id,name'])
                ->latest('created_at')
                ->take(10)
                ->get(['id', 'user_id', 'company_id', 'status', 'amount', 'created_at']);

            return compact(
                'totalUsers',
                'totalMembers',
                'totalCompanies',
                'totalTransactions',
                'pendingTransactions',
                'revenue',
                'chartLabels',
                'chartTxCount',
                'chartRevenue',
                'recentTransactions'
            );
        });

        return view('admin.dashboard', array_merge($data, [
            'startDate' => $startDate,
            'endDate'   => $endDate,
            'preset'    => $preset ?: null,
        ]));
    }

    /**
     * Resolve preset/custom date range menjadi dua Carbon (start, end).
     * Prioritas: custom (start_date & end_date) > preset > default 30 hari.
     */
    private function resolveDateRange(?string $preset, ?\DateTimeInterface $start, ?\DateTimeInterface $end): array
    {
        if ($start && $end) {
            $startDate = Carbon::parse($start)->startOfDay();
            $endDate   = Carbon::parse($end)->endOfDay();
            if ($startDate->gt($endDate)) {
                [$startDate, $endDate] = [$endDate->copy()->startOfDay(), $startDate->copy()->endOfDay()];
            }
            return [$startDate, $endDate];
        }

        $today = Carbon::today();
        switch ($preset) {
            case 'today':
                return [$today->copy(), $today->copy()];
            case '7d':
                return [$today->copy()->subDays(6), $today->copy()];
            case '30d':
                return [$today->copy()->subDays(29), $today->copy()];
            case 'this_month':
                return [$today->copy()->startOfMonth(), $today->copy()];
            case 'prev_month':
                $start = $today->copy()->subMonth()->startOfMonth();
                $end   = $today->copy()->subMonth()->endOfMonth();
                return [$start, $end];
            case 'ytd':
                return [$today->copy()->startOfYear(), $today->copy()];
            default:
                return [$today->copy()->subDays(29), $today->copy()];
        }
    }
}
