<?php

namespace App\Http\Controllers\Catin;

use Carbon\Carbon;
use App\Models\Wali;
use App\Models\Wife;
use App\Models\Rujuk;
use App\Models\Husband;
use App\Models\Married;
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

class RujukController extends Controller
{
    public function __construct()
    {
        View::share('type_menu', 'rujuk');
    }

    public function index()
    {
        $married = Married::with(['husbands', 'wives'])->where('users_id', Auth::user()->id)->first();
        // dd($married);
        $rujuk = Rujuk::where('married_id', $married->id)->first();
        return view('pages.catin.rujuk', compact('married', 'rujuk'));
    }

    public function store(Request $request)
    {
        // try {
        DB::transaction(function () use ($request) {
            $married = null;
            if ($request->action == "rujuk-non-regis") {
                $akad_masehi = $this->getFormattedDateTime($request->akad_date_masehi, $request->akad_time_masehi);
                $married = Married::updateOrCreate([
                    'users_id' => auth()->user()->id
                ], [
                    'akta_nikah_number' => $request->akta_nikah_number,
                    'akad_date_masehi' => $akad_masehi,
                    'marriage_date' => $request->marriage_date,
                    'akad_location' => $request->akad_location,
                    'desa_location' => $request->desa_location,
                    'status' => 4
                ]);

                $this->savePasangan($request, $married->id);

                $rujuk = Rujuk::updateOrCreate(
                    ['married_id' => $married->id],
                    [
                        'ktp_husband' => $this->uploadFile($request->file('ktp_husband', $married->rujuk?->ktp_husband), $married->registration_number, 'ktp_husband'),
                        'ktp_wife' => $this->uploadFile($request->file('ktp_wife', $married->rujuk?->ktp_wife), $married->registration_number, 'ktp_wife'),
                        'akta_cerai' => $this->uploadFile($request->file('akta_cerai', $married->rujuk?->akta_cerai), $married->registration_number, 'akta_cerai'),
                        'buku_nikah' => $this->uploadFile($request->file('buku_nikah', $married->rujuk?->buku_nikah), $married->registration_number, 'buku_nikah'),
                        'status' => 1,
                    ]
                );
            } else if ($request->action == "rujuk-regis") {
                $married = Married::where('akta_nikah_number', $request->akta_nikah)->first();
                $rujuk = Rujuk::updateOrCreate(
                    ['married_id' => $married->id],
                    [
                        'ktp_husband' => $this->uploadFile($request->file('ktp_husband', $married->rujuk?->ktp_husband), $married->registration_number, 'ktp_husband'),
                        'ktp_wife' => $this->uploadFile($request->file('ktp_wife', $married->rujuk?->ktp_wife), $married->registration_number, 'ktp_wife'),
                        'akta_cerai' => $this->uploadFile($request->file('akta_cerai', $married->rujuk?->akta_cerai), $married->registration_number, 'akta_cerai'),
                        'buku_nikah' => $this->uploadFile($request->file('buku_nikah', $married->rujuk?->buku_nikah), $married->registration_number, 'buku_nikah'),
                        'status' => 1,
                    ]
                );
            }

            if ($married != null) {
                $this->storeDocument($married, $request->file('ktp_husband'), 'KTP Suami', $rujuk->ktp_husband);
                $this->storeDocument($married, $request->file('ktp_wife'), 'KTP Istri', $rujuk->ktp_wife);
                $this->storeDocument($married, $request->file('akta_cerai'), 'Akta Cerai', $rujuk->akta_cerai);
                $this->storeDocument($married, $request->file('buku_nikah'), 'Buku Nikah', $rujuk->buku_nikah);
            }
        });

        return redirect()->route('catin.rujuk.index')->with('success', "Data berhasil disimpan");
        // } catch (\Throwable $e) {
        //     return $e;
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


    private function storeDocument($married, $file, $title, $path)
    {
        if ($file instanceof UploadedFile) {
            ArchiveDocument::create([
                'married_id' => $married->id,
                'title_document' => $title,
                'type_document' => 'rujuk',
                'path_document' => $path,
            ]);
        }
    }

    private function getFormattedDateTime($date, $time)
    {
        return Carbon::createFromFormat('Y-m-d H:i', "$date $time")->format('Y-m-d H:i');
    }

    private function savePasangan($request, $marriedId)
    {
        Husband::updateOrCreate(
            ['married_id' => $marriedId],
            [
                'nik_husband' => $request->nik_husband ?? null,
                'name_husband' => $request->name_husband ?? null,
                'location_birth_husband' => $request->location_birth_husband ?? null,
                'date_birth_husband' => $request->date_birth_husband ?? null,
                'address_husband' => $request->address_husband ?? null,
                'phone_number_husband' => $request->phone_number_husband ?? null,
            ]
        );

        Wife::updateOrCreate(
            ['married_id' => $marriedId],
            [
                'nik_wife' => $request->nik_wife ?? null,
                'name_wife' => $request->name_wife ?? null,
                'location_birth_wife' => $request->location_birth_wife ?? null,
                'date_birth_wife' => $request->date_birth_wife ?? null,
                'address_wife' => $request->address_wife ?? null,
                'phone_number_wife' => $request->phone_number_wife ?? null,
            ]
        );
    }
}
