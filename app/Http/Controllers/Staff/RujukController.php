<?php

namespace App\Http\Controllers\Staff;

use App\Models\Rujuk;
use Illuminate\Http\Request;
use App\Models\ArchiveDocument;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;

class RujukController extends Controller
{
    public function index()
    {
        $rujuks = Rujuk::all();
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
                'action' => 'in:approve,declined'
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
        } else if ($status == 3) {
            $rujuk->update([
                'status' => $status
            ]);
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
