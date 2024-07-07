<?php

namespace App\Http\Controllers\Catin;

use Carbon\Carbon;
use App\Models\Wali;
use App\Models\Wife;
use App\Models\Husband;
use App\Models\Married;
use App\Models\Perceraian;
use Illuminate\Http\Request;
use App\Models\MarriedPayment;
use App\Models\ArchiveDocument;
use App\Models\MarriedDocument;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Requests\RegisterRequest;

class CeraiController extends Controller
{
    public function __construct()
    {
        View::share('type_menu', 'perceraian');
    }

    public function index()
    {
        try {
            $married = Married::with(['husbands', 'wives'])->where('users_id', Auth::user()->id)->first();
            $perceraian = Perceraian::where('married_id', $married->id)->first();
            return view('pages.catin.perceraian', compact('married', 'perceraian'));
        } catch (\Throwable $e) {
            return 'error';
        }
    }

    public function store(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $married = Married::where('akta_nikah_number', $request->akta_nikah)->first();

                $perceraian = Perceraian::updateOrCreate(
                    ['married_id' => $married->id],
                    [
                        'surat_putusan' => $this->uploadFile($request->file('surat_putusan'), $married->registration_number, 'surat_putusan'),
                        'surat_keterangan_hamil' => $this->uploadFile($request->file('surat_keterangan_hamil'), $married->registration_number, 'surat_keterangan_hamil'),
                        'berita_acara_mediasi' => $this->uploadFile($request->file('berita_acara_mediasi'), $married->registration_number, 'berita_acara_mediasi'),
                        'status' => 1,
                    ]
                );

                $this->storeDocument($married, $request->file('surat_putusan'), 'Surat Putusan', $perceraian->surat_putusan);
                $this->storeDocument($married, $request->file('surat_keterangan_hamil'), 'Surat Keterangan Hamil', $perceraian->surat_keterangan_hamil);
                $this->storeDocument($married, $request->file('berita_acara_mediasi'), 'Berita Acara Mediasi', $perceraian->berita_acara_mediasi);
            });

            return redirect()->route('catin.perceraian.index')->with('success', "Data berhasil disimpan");
        } catch (\Throwable $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    private function uploadFile($file, $registrationNumber, $suffix)
    {
        if ($file instanceof UploadedFile) {
            $path = $registrationNumber . "_" . $suffix . "." . $file->getClientOriginalExtension();
            $file->storeAs('public/documents/cerai', $path);
            return $path;
        }
        return null;
    }

    private function storeDocument($married, $file, $title, $path)
    {
        if ($file instanceof UploadedFile) {
            ArchiveDocument::create([
                'married_id' => $married->id,
                'title_document' => $title,
                'type_document' => 'cerai',
                'path_document' => $path,
            ]);
        }
    }
}
