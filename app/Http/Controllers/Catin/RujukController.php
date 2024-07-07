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
use App\Models\Rujuk;
use App\Models\Wali;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class RujukController extends Controller
{
    public function __construct()
    {
        View::share('type_menu', 'rujuk');
    }

    public function index()
    {
        $married = Married::with(['husbands', 'wives'])->where('users_id', Auth::user()->id)->first();
        $rujuk = Rujuk::where('married_id', $married->id)->first();
        return view('pages.catin.rujuk', compact('married', 'rujuk'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // try {
        DB::transaction(function () use ($request) {
            $married = Married::where('akta_nikah_number', $request->akta_nikah)->first();
            Rujuk::updateOrCreate(
                ['married_id' => $married->id],
                [
                    'ktp_husband' => $this->uploadFile($request->file('ktp_husband', $married->rujuk?->ktp_husband), $married->registration_number, 'ktp_husband'),
                    'ktp_wife' => $this->uploadFile($request->file('ktp_wife', $married->rujuk?->ktp_wife), $married->registration_number, 'ktp_wife'),
                    'akta_cerai' => $this->uploadFile($request->file('akta_cerai', $married->rujuk?->akta_cerai), $married->registration_number, 'akta_cerai'),
                    'buku_nikah' => $this->uploadFile($request->file('buku_nikah', $married->rujuk?->buku_nikah), $married->registration_number, 'buku_nikah'),
                    'status' => 1,
                ]
            );
        });

        return redirect()->route('catin.rujuk.index')->with('success', "Data berhasil disimpan");
        // } catch (\Throwable $e) {
        //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        // }
    }

    private function uploadFile($file, $registrationNumber, $suffix)
    {
        if ($file instanceof UploadedFile) {
            $path = $registrationNumber . "_" . $suffix . "." . $file->getClientOriginalExtension();
            $file->storeAs('public/documents/rujuk', $path);
            return $path;
        }
        return $file;
    }
}
