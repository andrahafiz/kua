<?php

namespace App\Http\Controllers\Kakua;

use Carbon\Carbon;
use App\Models\Rujuk;
use App\Models\Married;
use App\Models\Perceraian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $monthlyMarriageCounts = $this->getMarriageCountsPerMonth();
        $monthlyCeraiCounts = $this->getCeraiCountsPerMonth();
        $monthlyRujukCounts = $this->getRujukCountsPerMonth();
        $marriageLocationCounts = $this->getMarriageLocationCountsPerMonth();
        $marriedToday = $this->getCountMarriedToday();
        $registerToday = $this->getCountRegisterToday();
        $ceraiToday = $this->getCountCeraiToday();
        $rujukToday = $this->getCountRujukToday();
        return view(
            'pages.kakua.dashboard',
            [
                'monthlyMarriageCounts' => $monthlyMarriageCounts,
                'monthlyCeraiCounts' => $monthlyCeraiCounts,
                'monthlyRujukCounts' => $monthlyRujukCounts,
                'marriageLocationCounts' => $marriageLocationCounts,
                'marriedToday' => $marriedToday,
                'registerToday' => $registerToday,
                'ceraiToday' => $ceraiToday,
                'rujukToday' => $rujukToday,
                'type_menu' => 'dashboard'
            ]
        );
    }

    public function getCountCeraiToday()
    {
        return Married::where('status', 4)
            ->where('status_married', 'Cerai')
            ->whereHas('perceraian', function ($q) {
                $q->whereDate('created_at', now())
                    ->where('status', 2);
            })
            ->count();
    }

    public function getCountRujukToday()
    {
        return Married::where('status', 4)
            ->where('status_married', 'Rujuk')
            ->whereHas('rujuk', function ($q) {
                $q->whereDate('tanggal_verifikasi', now())
                    ->where('status', 2);
            })
            ->count();
    }

    public function getCountMarriedToday()
    {
        return Married::where('status', 4)
            ->where('status_married', 'Menikah')
            ->whereDate('akad_date_masehi', now())
            ->count();
    }

    public function getCountRegisterToday()
    {
        return Married::whereDate('created_at', now())
            ->count();
    }

    public function getMarriageCountsPerMonth()
    {
        $currentYear = Carbon::now()->year;

        // Mengambil jumlah pernikahan per bulan untuk tahun ini menggunakan Eloquent
        $marriageCounts = Married::selectRaw('MONTH(akad_date_masehi) as month, count(*) as count')
            ->whereYear('akad_date_masehi', $currentYear)
            ->groupByRaw('MONTH(akad_date_masehi)')
            ->orderByRaw('MONTH(akad_date_masehi)')
            ->get();

        // Menyimpan hasil ke dalam array
        $counts = [];
        foreach ($marriageCounts as $marriageCount) {
            $counts[$marriageCount->month] = $marriageCount->count;
        }

        // Membuat array untuk setiap bulan dengan nilai default 0
        $monthlyCounts = [];
        for ($month = 1; $month <= 12; $month++) {
            $monthlyCounts[] = $counts[$month] ?? 0;
        }

        return $monthlyCounts;
    }


    public function getCeraiCountsPerMonth()
    {
        $currentYear = Carbon::now()->year;

        // Mengambil jumlah perceraian per bulan untuk tahun ini
        $marriageCounts = Perceraian::selectRaw('MONTH(created_at) as month, count(*) as count')

            ->whereHas('married', function ($query) {
                $query->where('status_married', 'Cerai')
                    ->where('status', 4);
            })
            ->whereYear('created_at', $currentYear)
            ->groupByRaw('MONTH(created_at)')
            ->orderByRaw('MONTH(created_at)')
            ->get();

        // Menyimpan hasil ke dalam array
        $counts = [];
        foreach ($marriageCounts as $marriageCount) {
            $counts[$marriageCount->month] = $marriageCount->count;
        }

        // Membuat array untuk setiap bulan dengan nilai default 0
        $monthlyCounts = [];
        for ($month = 1; $month <= 12; $month++) {
            $monthlyCounts[] = $counts[$month] ?? 0;
        }

        return $monthlyCounts;
    }

    public function getRujukCountsPerMonth()
    {
        $currentYear = Carbon::now()->year;

        // Mengambil jumlah perceraian per bulan untuk tahun ini
        $marriageCounts = Rujuk::selectRaw('MONTH(tanggal_verifikasi) as month, count(*) as count')

            ->whereHas('married', function ($query) {
                $query->where('status_married', 'Rujuk')
                    ->where('status', 4);
            })
            ->whereYear('tanggal_verifikasi', $currentYear)
            ->groupByRaw('MONTH(tanggal_verifikasi)')
            ->orderByRaw('MONTH(tanggal_verifikasi)')
            ->get();

        // Menyimpan hasil ke dalam array
        $counts = [];
        foreach ($marriageCounts as $marriageCount) {
            $counts[$marriageCount->month] = $marriageCount->count;
        }

        // Membuat array untuk setiap bulan dengan nilai default 0
        $monthlyCounts = [];
        for ($month = 1; $month <= 12; $month++) {
            $monthlyCounts[] = $counts[$month] ?? 0;
        }

        return $monthlyCounts;
    }

    public function getMarriageLocationCountsPerMonth()
    {
        $currentYear = Carbon::now()->year;

        // Query untuk pernikahan di KUA
        $kuaMarriageCounts = Married::selectRaw('MONTH(akad_date_masehi) as month, count(*) as count')
            ->whereYear('akad_date_masehi', $currentYear)
            ->where('married_on', 'DI KUA')
            ->groupByRaw('MONTH(akad_date_masehi)')
            ->orderByRaw('MONTH(akad_date_masehi)')
            ->get();

        // Query untuk pernikahan di luar KUA
        $nonKuaMarriageCounts = Married::selectRaw('MONTH(akad_date_masehi) as month, count(*) as count')
            ->whereYear('akad_date_masehi', $currentYear)
            ->where('married_on', 'DI LUAR KUA')
            ->groupByRaw('MONTH(akad_date_masehi)')
            ->orderByRaw('MONTH(akad_date_masehi)')
            ->get();

        // Memproses data pernikahan di KUA
        $kuaCounts = [];
        foreach ($kuaMarriageCounts as $marriageCount) {
            $kuaCounts[$marriageCount->month] = $marriageCount->count;
        }

        // Memproses data pernikahan di luar KUA
        $nonKuaCounts = [];
        foreach ($nonKuaMarriageCounts as $marriageCount) {
            $nonKuaCounts[$marriageCount->month] = $marriageCount->count;
        }

        // Menyusun data bulanan untuk chart
        $monthlyCounts = [
            'kua' => [],
            'non_kua' => []
        ];
        for ($month = 1; $month <= 12; $month++) {
            $monthlyCounts['kua'][] = $kuaCounts[$month] ?? 0;
            $monthlyCounts['non_kua'][] = $nonKuaCounts[$month] ?? 0;
        }

        return $monthlyCounts;
    }
}
