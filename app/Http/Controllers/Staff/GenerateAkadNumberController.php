<?php

namespace App\Http\Controllers\Staff;

use App\Models\Married;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
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
        $request->validate([
            'document_akta_nikah' => 'required|mimes:pdf'
        ]);

        $lastCounter = $married->max('counter') ?? 0;
        $counter = $lastCounter + 1;

        if ($request->document_akta_nikah instanceof UploadedFile) {
            $file   = $request->file('document_akta_nikah');
            $path =   $married->registration_number . '_AktaNikah' . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documents/akta_nikah', $path);
        }

        $married->update([
            'document_akta_nikah' =>    $path ?? null,
            'akta_nikah_number' => $married->nomor_akad,
            'counter' => $counter
        ]);

        return redirect()->route('staff.married.show', $married->id)->with('success', "Nomor Akad Nikah Telah Berhasil Dibuat");
    }
}
