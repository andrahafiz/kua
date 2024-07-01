<?php

namespace App\Http\Controllers\Staff;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $monthlyMarriageCounts = $this->getMarriageCountsPerMonth();
        return view(
            'pages.staff.dashboard',
            [
                'monthlyMarriageCounts' => $monthlyMarriageCounts,
                'type_menu' => 'dashboard'
            ]
        );
    }


    public function getMarriageCountsPerMonth()
    {
        $currentYear = Carbon::now()->year;

        $marriageCounts = DB::table('marrieds')
            ->select(DB::raw('MONTH(akad_date_masehi) as month'), DB::raw('count(*) as count'))
            ->whereYear('akad_date_masehi', $currentYear)
            ->groupBy(DB::raw('MONTH(akad_date_masehi)'))
            ->orderBy(DB::raw('MONTH(akad_date_masehi)'))
            ->get();

        // Convert the results to an array with month as key and count as value
        $counts = [];
        foreach ($marriageCounts as $marriageCount) {
            $counts[$marriageCount->month] = $marriageCount->count;
        }

        // Ensure we have a count for each month, even if it's 0
        $monthlyCounts = [];
        for ($month = 1; $month <= 12; $month++) {
            $monthlyCounts[] = $counts[$month] ?? 0;
        }

        return $monthlyCounts;
    }
}
