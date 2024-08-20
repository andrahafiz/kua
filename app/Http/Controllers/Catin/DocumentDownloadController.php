<?php

namespace App\Http\Controllers\Catin;

use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Married;

class DocumentDownloadController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.catin.document');
    }

    public function download($type)
    {
        // dd($type);
        // Load the view and pass any required data
        $married = Married::with(['husbands', 'wives'])
            ->where('users_id', auth()->user()->id)
            ->firstOrFail();

        $html = view('pages.catin.pdf.N4', ['data' => $married])->render();

        // Initialize Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Set the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF (force download)
        return $dompdf->stream('persetujuan_calon_pengantin.pdf', ['Attachment' => 0]);
    }
}
