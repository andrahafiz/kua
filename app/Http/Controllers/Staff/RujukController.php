<?php

namespace App\Http\Controllers\Staff;

use App\Models\Rujuk;
use App\Mail\RujukEmail;
use Illuminate\Http\Request;
use App\Models\ArchiveDocument;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class RujukController extends Controller
{
    public function index()
    {
        $rujuks = Rujuk::orderBy('created_at', 'desc')->orderBy('tanggal_verifikasi', 'desc')->get();
        return view('pages.staff.rujuk.rujuk', [
            'rujuks' => $rujuks,
            'type_menu' => 'pernikahan',
        ]);
    }

    public function show(Rujuk $rujuk)
    {
        $rujuk->load('married');
        return view('pages.staff.rujuk.detail-rujuk', [
            'rujuk' => $rujuk,
            'type_menu' => 'pernikahan',
        ]);
    }

    public function approval(Request $request, Rujuk $rujuk)
    {
        $data = $request->validate(
            [
                'tanggal_verifikasi' => 'required_if:action,approve', 'date_format:Y-m-d',
                'waktu_verifikasi' => 'required_if:action,approve', 'date_format:H:i',
                'berita_acara' => 'required_if:action,approve', 'file',
                'action' => ['required', 'in:approve,declined'],
                'reason_approval' => ['required_if:action,declined']
            ],
            [
                'reason_approval.required_if' => 'Keterangan harus diisi jika anda memilih menolak',
                'action.in' => 'Tipe approval tidak terdaftar',
            ]
        );

        $status = $data['action'] == 'approve' ? 2 : 3;
        if ($status == 2) {
            $rujuk->update([
                'status' => $status,
                'tanggal_verifikasi' => $data['tanggal_verifikasi'] . ' ' . $data['waktu_verifikasi'],
                'berita_acara' => $this->uploadFile($request->file('berita_acara', $rujuk?->berita_acara), $rujuk->married?->registration_number, 'berita_acara'),

            ]);
            $this->storeDocument($rujuk, $request->file('berita_acara'), 'Akta Cerai', $rujuk->berita_acara);
            $rujuk->married->update(['status_married' => "Rujuk"]);
            $rujuk->married->notifications()->create([
                'description' =>  'Pengajuan rujuk diterima',
                'message' => 'Sukses',
                'type' => 'success',
                'is_read' => false
            ]);

            if ($rujuk->married->user->email != null)
                Mail::to($rujuk->married->user->email)->send(new RujukEmail('approve'));
        } else if ($status == 3) {
            $rujuk->update([
                'status' => $status,
                'reason_approval' => $data['reason_approval']
            ]);

            $rujuk->married->notifications()->create([
                'description' => 'Pengajuan rujuk ditolak. Alasan : ' . ucwords($data['reason_approval']),
                'message' => 'Ditolak',
                'type' => 'danger',
                'is_read' => false
            ]);

            if ($rujuk->married->user->email != null)
                Mail::to($rujuk->married->user->email)->send(new RujukEmail('declined'));
        }

        return redirect()->route('staff.rujuk.index')->with('success', "Data berhasil disimpan");
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

    private function storeDocument($rujuk, $file, $title, $path)
    {
        if ($file instanceof UploadedFile) {
            ArchiveDocument::create([
                'married_id' => $rujuk->married->id,
                'title_document' => $title,
                'type_document' => 'rujuk',
                'path_document' => $path,
            ]);
        }
    }
}
