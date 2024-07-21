<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Married;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Married
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Married $married)
    {
        $data = $request->validate([
            'type' => ['required', 'in:approve,tolak'],
            'reason_approval' => ['required_if:type,tolak']
        ], [
            'reason_approval.required_if' => 'Keterangan harus diisi jika anda memilih menolak',
            'type.in' => 'Tipe approval tidak terdaftar',
        ]);

        $type = $data['type'];

    if ($type == 'approve') {
            $married->update([
                'status' => 3,
                'status_payment' => 2
            ]);

            $married->notifications()->create([
                'description' => 'Pembayaran telah diverifikasi',
                'message' => 'Sukses',
                'type' => 'success',
                'is_read' => false
            ]);
        } elseif ($type == 'tolak') {
            $married->update([
                'status' => 2,
                'reason_approval' => $data['reason_approval'],
                'status_payment' => 3
            ]);

            $married->notifications()->create([
                'description' => 'Pembayaran gagal diverifikasi. Alasan : ' . ucwords($data['reason_approval']),
                'message' => 'Gagal',
                'type' => 'danger',
                'is_read' => false
            ]);
        }

        return redirect()->route('staff.married.show', $married->id)->with('success', "Status Pembayaran Berhasil Diubah");
    }
}
