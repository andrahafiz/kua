<?php

namespace App\Http\Controllers\Staff;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Married;
use Illuminate\Http\Request;
use App\Models\MarriedPayment;
use App\Models\MarriedDocument;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use App\Http\Requests\RegisterRequest;

class ProfileController extends Controller
{

    public function __construct()
    {
        View::share('type_menu', 'pendaftaran');
    }

    public function index()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        
        return view('pages.staff.profile', compact('adminData'));
    }

    function update(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        $request->validate([
            'name' => ['sometimes', 'string'],
            'username' => ['sometimes', 'unique:users,username,' . $id],
            'nik' => ['sometimes', 'unique:users,nik,' . $id],
            'email' => ['sometimes', 'unique:users,email,' . $id],
        ]);

        $data->name = $request->name;
        $data->username = $request->username;
        $data->nik = $request->nik;
        $data->email = $request->email;
        if ($request->password != null)
            $data->password = Hash::make($request->password);

        $data->save();
        return redirect()->back()->with('success', "Data berhasil diubah");;
    }
}
