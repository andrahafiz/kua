<?php

namespace App\Http\Controllers\Kakua;

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
            'pages.kakua.penghulu.penghulu',
            ['type_menu' => 'penghulu', 'penghulus' => $penghulus]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'pages.kakua.penghulu.tambah-penghulu',
            ['type_menu' => 'penghulu']
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\PenghuluCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenghuluCreateRequest $request)
    {
        $params = $request->safe([
            'name_penghulu', 'phone', 'address', 'photo', 'status'
        ]);

        $photo = $request->file('photo');
        if ($photo instanceof UploadedFile) {
            $filename = $photo->store('public/photos/user');
        }

        $penghulu = Penghulu::create([
            'name_penghulu' => $params['name_penghulu'],
            'phone' => $params['phone'],
            'address' => $params['address'],
            'photo' => $filename ?? 'avatar-1.png',
            'status' => $params['status'],
        ]);
        return redirect()->route('kakua.penghulu.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Penghulu $penghulu
     * @return \Illuminate\Http\Response
     */
    public function edit(Penghulu $penghulu)
    {
        return view(
            'pages.kakua.penghulu.edit-penghulu',
            ['type_menu' => 'penghulu', 'penghulu' => $penghulu]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\PenghuluUpdateRequest  $request
     * @param  Penghulu $penghulu
     * @return \Illuminate\Http\Response
     */
    public function update(PenghuluUpdateRequest $request, Penghulu $penghulu)
    {
        $params = $request->safe([
            'name_penghulu', 'phone', 'address', 'photo', 'status'
        ]);
        try {
            DB::transaction(function () use ($params, $request, $penghulu) {
                $photo = $request->file('image');
                if ($photo instanceof UploadedFile) {
                    $file_path = storage_path() . '/app/' . $penghulu->photo;
                    if (File::exists($file_path)) {
                        unlink($file_path);
                    }
                    $filename = $photo->store('public/photos/user');
                } else {
                    $filename = $penghulu->photo;
                };
                $penghulu = $penghulu->update([
                    'name_penghulu' => $params['name_penghulu'],
                    'phone' => $params['phone'],
                    'address' =>  $request->address,
                    'photo' => $filename ?? 'avatar.jpg',
                    'status' => $params['status'],
                ]);
            });
            return redirect()->route('kakua.penghulu.index')->with('success', "Data user '{$penghulu->name}' berhasil diubah");
        } catch (\Throwable $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Penghulu $penghulu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penghulu $penghulu)
    {
        if ($penghulu->photo !== 'avatar.jpg') {
            $file_path = storage_path() . '/app/' . $penghulu->photo;
            if (File::exists($file_path)) {
                unlink($file_path);
            }
        }
        $penghulu->delete();

        return redirect()->route('kakua.penghulu.index')->with('success', "Data user '{$penghulu->name_penghulu}' berhasil dihapus");
    }
}
