<?php

namespace App\Http\Controllers\Catin;

use Carbon\Carbon;
use App\Models\Married;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function __construct()
    {
        View::share('type_menu', 'pendaftaran');
    }


    public function index()
    {
        return view('pages.catin.pendaftaran');
    }

    public function store(RegisterRequest $request)
    {
        // try {
        DB::transaction(function () use ($request) {
            $merried = Married::updateOrCreate(
                [
                    'users_id' => Auth()->user()->id
                ],
                [
                    'registration_number' => 'INV' ?? 'asdasd',
                    'location_name' => $request->location_name ?? 'asdasd',
                    'akad_date_masehi' => $request->akad_date_masehi ?? now(),
                    'akad_date_hijriah' => $request->akad_date_hijriah ??  now(),
                    'akad_location' => $request->akad_location ?? 'asdasd',
                    'nationality_wife' => $request->nationality_wife ?? 'asdasd',
                    'nik_wife' => $request->nik_wife ?? 'asdasd',
                    'name_wife' => $request->name_wife ?? 'asdasd',
                    'location_birth_wife' => $request->location_birth_wife ?? 'asdasd',
                    'date_birth_wife' => $request->date_birth_wife ?? now(),
                    'old_wife' => $request->old_wife ?? 1,
                    'status_wife' => $request->status_wife ?? 'asdasd',
                    'religion_wife' => $request->religion_wife ?? 'asdasd',
                    'address_wife' => $request->address_wife ?? 'asdasd',
                    'nationality_husband' => $request->nationality_husband ?? 'asdasd',
                    'nik_husband' => $request->nik_husband ?? 'asdasd',
                    'name_husband' => $request->name_husband ?? 'asdasd',
                    'location_birth_husband' => $request->location_birth_husband ?? 'asdasd',
                    'date_birth_husband' => $request->date_birth_husband ?? now(),
                    'old_husband' => $request->old_husband ?? 1,
                    'status_husband' => $request->status_husband ?? 'asdasd',
                    'religion_husband' => $request->religion_husband ?? 'asdasd',
                    'address_husband' => $request->address_husband ?? 'asdasd',
                    'status_payment' => '0' ?? 'asdasd',
                    'status' => 0 ?? 'asdasd',
                ]
            );

            $document = $this->saveDocument($merried, $request);
            // Married::updacreate([
            //     'category' => $params['nama'],
            //     'slug'     => Str::slug($params['nama']),
            //     'code'     => Str::upper($params['code']),
            // ]);
        });
        return redirect()->route('catin.merried.index')
            ->with('success', "Data kategori produk berhasil ditambah");
        // }
        // catch (\Throwable $e) {
        //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        // }
        dd($request->all());
    }

    private function saveDocument(Married $merried, $request)
    {
        $path_n1 = null;
        $path_n3 = null;
        $path_n5 = null;
        $path_surat_izin_komandan = null;
        $path_surat_akta_cerai = null;
        $path_ktp_husband = null;
        $path_kk_husband = null;
        $path_akta_husband = null;
        $path_ijazah_husband = null;
        $path_photo_husband = null;

        if ($request->N1 instanceof UploadedFile) {
            $file   = $request->file('N1');
            $path_n1 =   $merried->registration_number . '_N1' . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documents', $path_n1);
        }
        if ($request->N3 instanceof UploadedFile) {
            $file   = $request->file('N3');
            $path_n3 =   $merried->registration_number . '_N3' . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documents', $path_n3);
        }
        if ($request->N5 instanceof UploadedFile) {
            $file   = $request->file('N5');
            $path_n5 =   $merried->registration_number . '_N5' . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documents', $path_n5);
        }
        if ($request->surat_izin_komandan instanceof UploadedFile) {
            $file   = $request->file('surat_izin_komandan');
            $path_surat_izin_komandan =   $merried->registration_number . '_surat-izin-komandan' . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documents', $path_surat_izin_komandan);
        }

        if ($request->ktp_husband instanceof UploadedFile) {
            $file   = $request->file('ktp_husband');
            $path_ktp_husband =   $merried->registration_number . '_ktp' . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documents', $path_ktp_husband);
        }

        if ($request->akta_husband instanceof UploadedFile) {
            $file   = $request->file('akta_husband');
            $path_akta_husband =   $merried->registration_number . '_akta' . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documents', $path_akta_husband);
        }

        if ($request->kk_husband instanceof UploadedFile) {
            $file   = $request->file('akta_husband');
            $path_kk_husband =   $merried->registration_number . '_kk' . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documents', $path_kk_husband);
        }

        if ($request->ijazah_husband instanceof UploadedFile) {
            $file   = $request->file('ijazah_husband');
            $path_ijazah_husband =   $merried->registration_number . '_ijazah' . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documents', $path_ijazah_husband);
        }

        if ($request->photo_husband instanceof UploadedFile) {
            $file   = $request->file('photo_husband');
            $path_photo_husband =   $merried->registration_number . '_photo' . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documents', $path_photo_husband);
        }

        if ($request->surat_akta_cerai instanceof UploadedFile) {
            $file   = $request->file('surat_akta_cerai');
            $path_surat_akta_cerai =   $merried->registration_number . '_surat-akta-cerai' . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documents', $path_surat_akta_cerai);
        }

        $merried->married_documents()->updateOrCreate([
            'N1' => $path_n1 ?? null,
            'N3' => $path_n3 ?? null,
            'N5' => $path_n5 ?? null,
            'surat_izin_komandan' => $path_surat_izin_komandan ?? null,
            'surat_akta_cerai' => $path_surat_akta_cerai ?? null,
            'ktp_husband' => $path_ktp_husband ?? null,
            'kk_husband' => $path_kk_husband ?? null,
            'akta_husband' => $path_akta_husband ?? null,
            'ijazah_husband' => $path_ijazah_husband ?? null,
            'photo_husband' => $path_photo_husband ?? null
        ]);
        // dd();
    }
}
