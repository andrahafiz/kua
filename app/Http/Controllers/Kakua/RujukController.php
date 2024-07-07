<?php

namespace App\Http\Controllers\Kakua;

use App\Models\Rujuk;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;

class RujukController extends Controller
{
    public function index()
    {
        $rujuks = Rujuk::all();
        return view('pages.kakua.rujuk.rujuk', [
            'rujuks' => $rujuks,
            'type_menu' => 'pernikahan',
        ]);
    }

    public function show(Rujuk $rujuk)
    {
        $rujuk->load('married');
        return view('pages.kakua.rujuk.detail-rujuk', [
            'rujuk' => $rujuk,
            'type_menu' => 'pernikahan',
        ]);
    }
}
