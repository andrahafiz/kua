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
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Married $married)
    {
        $type = $request->type;
        if ($type == 'approve') {
            $married->update([
                'status' => 3,
                'status_payment' => 2
            ]);
        } elseif ($type == 'tolak') {
            $married->update([
                'status' => 2,
                'status_payment' => 3
            ]);
        } else {
        }

        return redirect()->route('staff.married.show', $married->id)->with('success', "Status Pembayaran Berhasil Diubah");
    }
}
