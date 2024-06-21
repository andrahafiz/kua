<?php

namespace App\Http\Controllers\Staff;

use App\Models\Married;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenerateAkadNumberController extends Controller
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
        $lastCounter = $married->max('counter') ?? 0;
        $counter = $lastCounter + 1;

        $married->update([
            'akta_nikah_number' => $married->nomor_akad,
            'counter' => $counter
        ]);

        return redirect()->route('staff.married.show', $married->id)->with('success', "Nomor Akad Nikah Telah Berhasil Dibuat");
    }
}
