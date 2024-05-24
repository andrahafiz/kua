<?php

namespace App\Http\Controllers\Catin;

use App\Models\Married;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $married = Married::where('users_id', Auth::user()->id)->first();
        $notifications = Notification::where('married_id', $married->id)->get();

        return view(
            'pages.catin.notification',
            [
                'notifications' => $notifications
            ]
        );
    }

    public function read(Notification $notification = null)
    {
        if ($notification == null) {
            $married = Married::where('users_id', Auth::user()->id)->first();
            Notification::where('married_id', $married->id)->update([
                'is_read' => 1
            ]);
        } else {
            $notification->update([
                'is_read' => 1
            ]);
        }
        return redirect()->route('catin.married.notification')
            ->with('success', "Pesan telah dibaca");
    }
}
