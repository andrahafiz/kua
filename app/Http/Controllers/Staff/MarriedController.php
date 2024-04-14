<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Married;
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
        // dd();
        return view('pages.staff.married.detail-married', [
            'married' => $married,
            'type_menu' => 'pernikahan'
        ]);
    }
}
