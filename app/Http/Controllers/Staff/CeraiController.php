<?php

namespace App\Http\Controllers\Staff;

use App\Mail\CeraiEmail;
use App\Models\Perceraian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class CeraiController extends Controller
{
    public function index()
    {
        $cerais = Perceraian::all();
        return view('pages.staff.cerai.cerai', [
            'cerais' => $cerais,
            'type_menu' => 'pernikahan',
        ]);
    }

    public function show(Perceraian $cerai)
    {
        $cerai->load('married');
        return view('pages.staff.cerai.detail-cerai', [
            'perceraian' => $cerai,
            'type_menu' => 'pernikahan',
        ]);
    }

    public function approval(Request $request, Perceraian $cerai)
    {
        DB::transaction(function () use ($request, $cerai) {
            $data = $request->validate([
                'action' => ['required', 'in:approve,declined'],
                'reason_approval' => ['required_if:action,declined']
            ], [
                'reason_approval.required_if' => 'Keterangan harus diisi jika anda memilih menolak',
                'action.in' => 'Tipe approval tidak terdaftar',
            ]);

            $status = $data['action'] == 'approve' ? 2 : 3;
            $cerai->update([
                'status' => $status,
                'reason_approval' => $data['reason_approval']
            ]);

            if ($status == 2) {
                $cerai->married->update(['status_married' => "Cerai"]);
                $cerai->married->notifications()->create([
                    'description' =>  'Pengajuan cerai diterima',
                    'message' => 'Sukses',
                    'type' => 'success',
                    'is_read' => false
                ]);

                if ($cerai->married->user->email != null)
                    Mail::to($cerai->married->user->email)->send(new CeraiEmail('approve'));
            } else if ($status == 3) {
                $cerai->married->notifications()->create([
                    'description' => 'Pengajuan cerai ditolak. Alasan : ' . ucwords($data['reason_approval']),
                    'message' => 'Ditolak',
                    'type' => 'danger',
                    'is_read' => false
                ]);

                if ($cerai->married->user->email != null)
                    Mail::to($cerai->married->user->email)->send(new CeraiEmail('declined'));
            }
        });

        return redirect()->route('staff.perceraian.index')->with('success', "Data berhasil disimpan");
    }
}
