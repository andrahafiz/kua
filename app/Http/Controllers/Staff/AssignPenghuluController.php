<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Married;
use Illuminate\Http\Request;

class AssignPenghuluController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Married
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Married $married)
    {
        $married->update([
            'penghulu_id' => $request->penghulu,
            'status' => 4,
            'pramarried_date' => $request->tgl_pranikah
        ]);

        $married->notifications()->create([
            'description' => 'Penetapan Penghulu : ' . $married->penghulu->name_penghulu,
            'message' => 'Sukses',
            'type' => 'success',
            'is_read' => false
        ]);

        $married->notifications()->create([
            'description' => 'Penetapan Jadwal Pranikah : ' . $request->tgl_pranikah,
            'message' => 'Sukses',
            'type' => 'success',
            'is_read' => false
        ]);

        return redirect()->route('staff.married.show', $married->id)->with('success', "Penghulu dan Tanggal Pranikah Sudah Ditentukan");
    }
}
