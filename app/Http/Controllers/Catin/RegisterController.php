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
        try {
            $married = Married::with(['husbands'])->where('users_id', Auth::user()->id)->first();
            $documentmarried = MarriedDocument::where('married_id', $married->id)->first();
            $paymentmarried = MarriedPayment::where('married_id', $married->id)->first();

            return view('pages.catin.pendaftaran', compact('married', 'documentmarried', 'paymentmarried'));
        } catch (\Throwable $e) {
            return 'error';
        }
    }

    public function store(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {


                $married = $this->saveMarried($request);
                $this->saveHusband($request, $married->id);
                $this->saveDocumentHusband($married, $request);
                $this->uploadPayment($married, $request);
                $this->addNotification($married, 'Data telah selesai diisi', 'Sukses', 'success');
            });

            return redirect()->route('catin.married.index')->with('success', "Data berhasil disimpan");
        } catch (\Throwable $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    private function getFormattedDateTime($date, $time)
    {
        return Carbon::createFromFormat('Y-m-d H:i', "$date $time")->format('Y-m-d H:i');
    }

    private function saveMarried($request)
    {
        $akad_masehi = $this->getFormattedDateTime($request->akad_date_masehi, $request->akad_time_masehi);
        return Married::updateOrCreate(
            ['users_id' => auth()->user()->id],
            [
                'location_name' => $request->location_name,
                'akad_date_masehi' => $akad_masehi,
                'akad_location' => $request->akad_location,
                'kua' => $request->kua,
                'married_on' => $request->married_on,
                'desa_location' => $request->desa_location,
                'status_payment' => '0',
                'status' => 0,
            ]
        );
    }

    private function saveHusband($request, $marriedId)
    {
        Husband::updateOrCreate(
            ['married_id' => $marriedId],
            [
                'citizen_husband' => 'WNI',
                'nationality_husband' => $request->nationality_husband ?? null,
                'nik_husband' => $request->nik_husband ?? null,
                'name_husband' => $request->name_husband ?? null,
                'location_birth_husband' => $request->location_birth_husband ?? null,
                'date_birth_husband' => $request->date_birth_husband ?? null,
                'old_husband' => $request->old_husband ?? 0,
                'status_husband' => $request->status_husband ?? null,
                'religion_husband' => $request->religion_husband ?? null,
                'job_husband' => $request->job_husband ?? null,
                'education_husband' => $request->education_husband ?? null,
                'email_husband' => $request->email_husband ?? null,
                'address_husband' => $request->address_husband ?? null,
                'name_father_husband' => $request->name_father_husband ?? null,
                'is_unknown_father_husband' => $request->is_unknown_father_husband ?? null,
                'citizen_father_husband' => $request->citizen_father_husband ?? null,
                'nik_father_husband' => $request->nik_father_husband ?? null,
                'nationality_father_husband' => $request->nationality_father_husband ?? null,
                'no_passport_father_husband' => $request->no_passport_father_husband ?? null,
                'location_birth_father_husband' => $request->location_birth_father_husband ?? null,
                'date_birth_father_husband' => $request->date_birth_father_husband ?? null,
                'religion_father_husband' => $request->religion_father_husband ?? null,
                'job_father_husband' => $request->job_father_husband ?? null,
                'address_father_husband' => $request->address_father_husband ?? null,
                'name_mother_husband' => $request->name_mother_husband ?? null,
                'is_unknown_mother_husband' => $request->is_unknown_mother_husband ?? null,
                'citizen_mother_husband' => $request->citizen_mother_husband ?? null,
                'nik_mother_husband' => $request->nik_mother_husband ?? null,
                'nationality_mother_husband' => $request->nationality_mother_husband ?? null,
                'no_passport_mother_husband' => $request->no_passport_mother_husband ?? null,
                'location_birth_mother_husband' => $request->location_birth_mother_husband ?? null,
                'date_birth_mother_husband' => $request->date_birth_mother_husband ?? null,
                'religion_mother_husband' => $request->religion_mother_husband ?? null,
                'job_mother_husband' => $request->job_mother_husband ?? null,
                'address_mother_husband' => $request->address_mother_husband ?? null,
            ]
        );
    }

    private function saveWife($request, $marriedId)
    {
        Wife::updateOrCreate(
            ['married_id' => $marriedId],
            [
                'citizen_wife' => 'WNI',
                'nationality_wife' => $request->nationality_wife,
                'nik_wife' => $request->nik_wife,
                'name_wife' => $request->name_wife,
                'location_birth_wife' => $request->location_birth_wife,
                'date_birth_wife' => $request->date_birth_wife,
                'old_wife' => $request->old_wife ?? 0,
                'status_wife' => $request->status_wife,
                'religion_wife' => $request->religion_wife,
                'address_wife' => $request->address_wife,
            ]
        );
    }

    private function addNotification($married, $description, $message, $type)
    {
        $married->notifications()->create([
            'description' => $description,
            'message' => $message,
            'type' => $type,
            'is_read' => true,
        ]);
    }

    private function saveDocumentHusband(Married $married, $request)
    {
        $documentPaths = [
            'photo_husband' => $this->uploadFile($request->file('photo_husband'), $married->registration_number, 'photo_husband'),
            'ktp_husband' => $this->uploadFile($request->file('ktp_husband'), $married->registration_number, 'ktp_husband'),
            'kk_husband' => $this->uploadFile($request->file('kk_husband'), $married->registration_number, 'kk_husband'),
            'akta_husband' => $this->uploadFile($request->file('akta_husband'), $married->registration_number, 'akta_husband'),
            'ijazah_husband' => $this->uploadFile($request->file('ijazah_husband'), $married->registration_number, 'ijazah_husband'),
            'surat_keterangan_wali_nikah_husband' => $this->uploadFile($request->file('surat_keterangan_wali_nikah_husband'), $married->registration_number, 'surat_keterangan_wali_nikah_husband'),
            'N1_husband' => $this->uploadFile($request->file('N1_husband'), $married->registration_number, 'N1_husband'),
            'N4_husband' => $this->uploadFile($request->file('N4_husband'), $married->registration_number, 'N4_husband'),
            'N2_husband' => $this->uploadFile($request->file('N2_husband'), $married->registration_number, 'N2_husband'),
            'N5_husband' => $this->uploadFile($request->file('N5_husband'), $married->registration_number, 'N5_husband'),
            'akta_cerai_husband' => $this->uploadFile($request->file('akta_cerai_husband'), $married->registration_number, 'akta_cerai_husband'),
            'akta_kematian_husband' => $this->uploadFile($request->file('akta_kematian_husband'), $married->registration_number, 'akta_kematian_husband'),
            'rekomendasi_kua_husband' => $this->uploadFile($request->file('rekomendasi_kua_husband'), $married->registration_number, 'rekomendasi_kua_husband'),
            'surat_kedutaan_husband' => $this->uploadFile($request->file('surat_kedutaan_husband'), $married->registration_number, 'surat_kedutaan_husband'),
            'surat_izin_komandan_husband' => $this->uploadFile($request->file('surat_izin_komandan_husband'), $married->registration_number, 'surat_izin_komandan_husband'),
            'surat_dispensasi_husband' => $this->uploadFile($request->file('surat_dispensasi_husband'), $married->registration_number, 'surat_dispensasi_husband'),
        ];
        $married->married_documents()->updateOrCreate(
            ['married_id' => $married->id],
            array_filter($documentPaths, fn ($path) => $path !== null)
        );
    }

    private function uploadFile($file, $registrationNumber, $suffix)
    {
        if ($file instanceof UploadedFile) {
            $path = $registrationNumber . "_" . $suffix . "." . $file->getClientOriginalExtension();
            $file->storeAs('public/documents', $path);
            return $path;
        }
        return null;
    }

    private function uploadPayment(Married $married, $request)
    {
        $path = 'public/photos/payment/';
        $path_payment = $this->uploadFile($request->file('proof_payment'), $married->registration_number, 'proof_payment');

        $married->update(['status_payment' => 1, 'status' => 1]);
        $married->married_payment()->updateOrCreate(
            ['married_id' => $married->id],
            ['proof_payment' => $path . $path_payment ?? $married->married_payment?->proof_payment]
        );
    }
}
