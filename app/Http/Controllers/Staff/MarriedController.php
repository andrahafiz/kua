<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Married;
use App\Models\Penghulu;
use Illuminate\Http\Request;

class MarriedController extends Controller
{
    public function index()
    {
        $marrieds = Married::get();
        return view('pages.staff.married.married', [
            'marrieds' => $marrieds,
            'type_menu' => 'pernikahan'
        ]);
    }

    public function show(Married $married)
    {
        $married->load(['user', 'married_documents', 'married_payment']);
        $penghulu = Penghulu::get();
        return view('pages.staff.married.detail-married', [
            'married' => $married,
            'penghulu' => $penghulu,
            'type_menu' => 'pernikahan'
        ]);
    }

    public function scheduleMarried()
    {
        $marrieds = Married::with('penghulu')
            ->where('status', 4)
            ->select('id', 'registration_number', 'name_wife', 'name_husband', 'akad_date_masehi', 'penghulu_id')
            ->get();
        return view('pages.staff.married.schedule-married', [
            'marrieds' => $marrieds,
            'type_menu' => 'pernikahan'
        ]);
    }
}
