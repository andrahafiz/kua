<?php

namespace App\Http\Controllers\Catin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $married = auth()->user()->marrieds->first();
        return view('pages.catin.beranda', ['type_menu' => 'beranda', 'married' => $married]);
    }
}
