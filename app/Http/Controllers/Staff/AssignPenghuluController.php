<?php

namespace App\Http\Controllers\Staff;

use App\Models\Married;
use Illuminate\Http\Request;
use App\Mail\SendScheduleEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

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

        $data = [
            'tanggal' => $married->pramarried_date?->isoFormat('dddd, D MMMM Y'),
            'jam' => $married->pramarried_date?->format('H:i'),
        ];

        if ($married->user->email != null)
            Mail::to($married->user->email)->send(new SendScheduleEmail($data));


        return redirect()->route('staff.married.show', $married->id)->with('success', "Penghulu dan Tanggal Pranikah Sudah Ditentukan");
    }
}
