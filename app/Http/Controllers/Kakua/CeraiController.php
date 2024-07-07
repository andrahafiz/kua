<?php

namespace App\Http\Controllers\Kakua;

use App\Http\Controllers\Controller;
use App\Models\Perceraian;
use Illuminate\Http\Request;

class CeraiController extends Controller
{
    public function index()
    {
        $cerais = Perceraian::all();
        return view('pages.kakua.cerai.cerai', [
            'cerais' => $cerais,
            'type_menu' => 'pernikahan',
        ]);
    }

    public function show(Perceraian $cerai)
    {
        $cerai->load('married');
        return view('pages.kakua.cerai.detail-cerai', [
            'perceraian' => $cerai,
            'type_menu' => 'pernikahan',
        ]);
    }
}
