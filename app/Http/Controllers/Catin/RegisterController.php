<?php

namespace App\Http\Controllers\Catin;

use Carbon\Carbon;
use App\Models\Married;
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
            $married = Married::where('users_id', Auth::user()->id)->first();
            // if ($married == null) {
            //     return redirect()->route('catin.married.index')->withErrors(['error' => 'Data tidak ditemukan']);
            // }
            $documentmarried = MarriedDocument::where('married_id', $married->id)->first();
            $paymentmarried = MarriedPayment::where('married_id', $married->id)->first();
            return view('pages.catin.pendaftaran', [
                'married' => $married,
                'documentmarried' => $documentmarried,
                'paymentmarried' => $paymentmarried
            ]);
        } catch (\Throwable $e) {
            return 'error';
        }
    }

    public function store(RegisterRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $akad_masehi = Carbon::createFromFormat('Y-m-d H:i', $request->akad_date_masehi . ' ' . $request->akad_time_masehi)->format('Y-m-d H:i');

                $married = Married::updateOrCreate(
                    [
                        'users_id' => Auth()->user()->id
                    ],
                    [
                        'location_name' => $request->location_name,
                        'akad_date_masehi' => $akad_masehi,
                        'akad_location' => $request->akad_location,
                        'nationality_wife' => $request->nationality_wife,
                        'nik_wife' => $request->nik_wife,
                        'name_wife' => $request->name_wife,
                        'location_birth_wife' => $request->location_birth_wife,
                        'date_birth_wife' => $request->date_birth_wife,
                        'old_wife' => $request->old_wife ?? 1,
                        'status_wife' => $request->status_wife,
                        'religion_wife' => $request->religion_wife,
                        'address_wife' => $request->address_wife,
                        'nationality_husband' => $request->nationality_husband,
                        'nik_husband' => $request->nik_husband,
                        'name_husband' => $request->name_husband,
                        'location_birth_husband' => $request->location_birth_husband,
                        'date_birth_husband' => $request->date_birth_husband,
                        'old_husband' => $request->old_husband ?? 1,
                        'status_husband' => $request->status_husband,
                        'religion_husband' => $request->religion_husband,
                        'address_husband' => $request->address_husband,
                        'status_payment' => '0',
                        'status' => 0,
                    ]
                );

                $document = $this->saveDocument($married, $request);
                $bukti_pembayaran = $this->uploadPayment($married, $request);

                $married->notifications()->create([
                    'description' => 'Data telah selesai diisi',
                    'message' => 'Sukses',
                    'type' => 'success',
                    'is_read' => true
                ]);
            });
            return redirect()->route('catin.married.index')
                ->with('success', "Data berhasil ditambah");
        } catch (\Throwable $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    private function saveDocument(Married $married, $request)
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
            $path_n1 =   $married->registration_number . '_N1' . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documents', $path_n1);
        }
        if ($request->N3 instanceof UploadedFile) {
            $file   = $request->file('N3');
            $path_n3 =   $married->registration_number . '_N3' . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documents', $path_n3);
        }
        if ($request->N5 instanceof UploadedFile) {
            $file   = $request->file('N5');
            $path_n5 =   $married->registration_number . '_N5' . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documents', $path_n5);
        }
        if ($request->surat_izin_komandan instanceof UploadedFile) {
            $file   = $request->file('surat_izin_komandan');
            $path_surat_izin_komandan =   $married->registration_number . '_surat-izin-komandan' . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documents', $path_surat_izin_komandan);
        }

        if ($request->ktp_husband instanceof UploadedFile) {
            $file   = $request->file('ktp_husband');
            $path_ktp_husband =   $married->registration_number . '_ktp' . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documents', $path_ktp_husband);
        }

        if ($request->akta_husband instanceof UploadedFile) {
            $file   = $request->file('akta_husband');
            $path_akta_husband =   $married->registration_number . '_akta' . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documents', $path_akta_husband);
        }

        if ($request->kk_husband instanceof UploadedFile) {
            $file   = $request->file('kk_husband');
            $path_kk_husband =   $married->registration_number . '_kk' . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documents', $path_kk_husband);
        }

        if ($request->ijazah_husband instanceof UploadedFile) {
            $file   = $request->file('ijazah_husband');
            $path_ijazah_husband =   $married->registration_number . '_ijazah' . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documents', $path_ijazah_husband);
        }

        if ($request->photo_husband instanceof UploadedFile) {
            $file   = $request->file('photo_husband');
            $path_photo_husband =   $married->registration_number . '_photo' . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documents', $path_photo_husband);
        }

        if ($request->surat_akta_cerai instanceof UploadedFile) {
            $file   = $request->file('surat_akta_cerai');
            $path_surat_akta_cerai =   $married->registration_number . '_surat-akta-cerai' . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/documents', $path_surat_akta_cerai);
        }
        $married->married_documents()->updateOrCreate(['married_id' => $married->id], [
            'N1' => $path_n1 ?? $married->married_documents?->N1,
            'N3' => $path_n3 ?? $married->married_documents?->N3,
            'N5' => $path_n5 ?? $married->married_documents?->N5,
            'surat_izin_komandan' => $path_surat_izin_komandan ?? $married->married_documents?->surat_izin_komandan,
            'surat_akta_cerai' => $path_surat_akta_cerai ?? $married->married_documents?->surat_akta_cerai,
            'ktp_husband' => $path_ktp_husband ?? $married->married_documents?->ktp_husband,
            'kk_husband' => $path_kk_husband ?? $married->married_documents?->kk_husband,
            'akta_husband' => $path_akta_husband ?? $married->married_documents?->akta_husband,
            'ijazah_husband' => $path_ijazah_husband ?? $married->married_documents?->ijazah_husband,
            'photo_husband' => $path_photo_husband ??  $married->married_documents?->photo_husband
        ]);
    }

    private function uploadPayment(Married $married, $request)
    {

        $path = 'public/photos/payment/';
        $path_payment = '';
        $photo = $request->file('proof_payment');
        if ($photo instanceof UploadedFile) {
            $file   = $request->file('proof_payment');
            $path_payment =   $married->registration_number . '_proof_payment' . '.' . $file->getClientOriginalExtension();
            $file->storeAs($path, $path_payment);
        }

        $married->update([
            'status_payment' => 1,
            'status' => 1
        ]);

        $married->married_payment()->updateOrCreate(['married_id' => $married->id], [
            'proof_payment' => $path . '' . $path_payment ?? $married->married_payment?->proof_payment,
        ]);
    }
}
