<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $userCounts = User::query()->selectRaw('role, COUNT(*) as total')
            ->groupBy('role')->pluck('total', 'role');

        return view('dashboard', ['page' => 'Dashboard', 'userCounts' => $userCounts]);
    }

    public function summary(): View
    {
        $start = now()->startOfYear();
        $query = DB::table('fruits_detaile_tbl')
            ->where('tarikh', '>=', $start->toDateString())
            ->where('tarikh', '<', $start->copy()->addYear()->toDateString());
        $fields = ['dituai', 'muda', 'busuk', 'panjang', 'kosong'];
        $totals = collect((array) (clone $query)->selectRaw(collect($fields)
            ->map(fn ($field) => "COALESCE(SUM(CAST(NULLIF($field, '') AS DECIMAL(20, 2))), 0) as $field")->implode(', '))->first());

        // Aggregate in the database so memory use does not grow with harvest records.
        $monthlyTotals = (clone $query)->select('tarikh')->selectRaw("SUM(CAST(NULLIF(dituai, '') AS DECIMAL(20, 2))) as total")
            ->groupBy('tarikh')->get()
            ->groupBy(fn ($row) => Carbon::parse($row->tarikh)->format('m'))
            ->map(fn ($rows) => $rows->sum('total'));

        return view('super.dashboard-super', [
            'page' => 'Dashboard', 'year' => $start->year,
            'totals' => $totals, 'monthlyTotals' => $monthlyTotals,
        ]);
    }
}
