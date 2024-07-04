<?php

namespace App\Http\Controllers\Catin;

use Carbon\Carbon;
use App\Models\Married;
use App\Models\Husband;
use App\Models\Wife;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Http\Requests\RegisterRequest;
use App\Models\MarriedDocument;
use App\Models\MarriedPayment;
use App\Models\Perceraian;
use App\Models\Wali;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

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
                Perceraian::updateOrCreate(
                    ['married_id' => $married->id],
                    [
                        'surat_putusan' => $this->uploadFile($request->file('surat_putusan'), $married->registration_number, 'surat_putusan'),
                        'surat_keterangan_hamil' => $this->uploadFile($request->file('surat_keterangan_hamil'), $married->registration_number, 'surat_keterangan_hamil'),
                        'berita_acara_mediasi' => $this->uploadFile($request->file('berita_acara_mediasi'), $married->registration_number, 'berita_acara_mediasi'),
                        'status' => 1,
                    ]
                );
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
}
