<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Perceraian;
use Illuminate\Http\Request;

class CeraiController extends Controller
{
    public function index()
    {
        $cerais = Perceraian::all();
        return view('pages.staff.cerai.cerai', [
            'cerais' => $cerais,
            'type_menu' => 'pernikahan',
        ]);
    }

    public function show(Perceraian $cerai)
    {
        $cerai->load('married');
        return view('pages.staff.cerai.detail-cerai', [
            'perceraian' => $cerai,
            'type_menu' => 'pernikahan',
        ]);
    }

    public function approval(Request $request, Perceraian $cerai)
    {
        $status = $request->action == 'approve' ? 2 : 3;
        $cerai->update(['status' => $status]);

        if ($status == 2) {
            $cerai->married->update(['status_married' => "Cerai"]);
        }

        return redirect()->route('staff.perceraian.index')->with('success', "Data berhasil disimpan");
    }
}
