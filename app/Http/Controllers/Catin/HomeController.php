<?php

namespace App\Http\Controllers\Catin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.catin.beranda', ['type_menu' => 'beranda']);
    }
}
