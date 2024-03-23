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
}
