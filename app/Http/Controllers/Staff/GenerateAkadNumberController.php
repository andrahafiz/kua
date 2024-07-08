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
     * @param \App\Models\Married $married
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Married $married)
    {
        $request->validate([
            'document_akta_nikah' => 'required|mimes:pdf'
        ]);

        $lastCounter = Married::max('counter') ?? 0;
        $counter = $lastCounter + 1;

        if ($request->document_akta_nikah instanceof UploadedFile) {
            $file = $request->file('document_akta_nikah');
            $path = $married->registration_number . '_AktaNikah' . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documents/akta_nikah', $path);
        }

        $married->update([
            'document_akta_nikah' => $path ?? null,
            'status_married' => 'Menikah',
        ]);

        $this->generateAkadNumber($married, $counter);

        return redirect()->route('staff.married.show', $married->id)->with('success', "Nomor Akad Nikah Telah Berhasil Dibuat");
    }

    protected function convertToRoman($month)
    {
        $romans = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
        return $romans[$month - 1];
    }

    protected function generateAkadNumber(Married $married, $counter)
    {
        $year = date('Y');
        $romawiMonth = $this->convertToRoman(date('n'));
        $aktaNikahNumber = str_pad($counter, 5, "0", STR_PAD_LEFT) . '/AKAD/' . $romawiMonth . '/' . $year;

        $married->update([
            'akta_nikah_number' => $aktaNikahNumber,
            'counter' => $counter,
        ]);
    }
}
