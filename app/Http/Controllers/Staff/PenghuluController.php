<?php

namespace App\Http\Controllers\Staff;

use App\Models\Penghulu;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\PenghuluCreateRequest;
use App\Http\Requests\PenghuluUpdateRequest;

class PenghuluController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penghulus = Penghulu::get();
        return view(
            'pages.staff.penghulu.penghulu',
            ['type_menu' => 'penghulu', 'penghulus' => $penghulus]
        );
    }
}
