<?php

namespace App\Http\Controllers\Staff;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\DocumentCreateRequest;
use App\Http\Requests\DocumentUpdateRequest;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::get();
        return view(
            'pages.staff.document.document',
            ['type_menu' => 'document', 'documents' => $documents]
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
            'pages.staff.document.tambah-document',
            ['type_menu' => 'document']
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\DocumentCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentCreateRequest $request)
    {
        $params = $request->safe([
            'title', 'number_document',  'file'
        ]);

        $file = $request->file('file');
        if ($file instanceof UploadedFile) {
            $filename = $file->store('public/files/document');
        }

        $document = Document::create([
            'title' => $params['title'],
            'number_document' => $params['number_document'],
            'file' => $filename ?? 'avatar-1.png',
        ]);
        return redirect()->route('staff.document.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Document $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        return view(
            'pages.staff.document.edit-document',
            ['type_menu' => 'document', 'document' => $document]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\DocumentUpdateRequest  $request
     * @param  Document $document
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentUpdateRequest $request, Document $document)
    {
        $params = $request->safe([
            'title', 'number_document', 'file'
        ]);
        try {
            DB::transaction(function () use ($params, $request, $document) {
                $file = $request->file('image');
                if ($file instanceof UploadedFile) {
                    $file_path = storage_path() . '/app/' . $document->file;
                    if (File::exists($file_path)) {
                        unlink($file_path);
                    }
                    $filename = $file->store('public/files/user');
                } else {
                    $filename = $document->file;
                };
                $document = $document->update([
                    'title' => $params['title'],
                    'number_document' => $params['number_document'],
                    'file' => $filename ?? 'avatar.jpg',
                ]);
            });
            return redirect()->route('staff.document.index')->with('success', "Data user '{$document->name}' berhasil diubah");
        } catch (\Throwable $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Document $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        if ($document->file !== 'avatar.jpg') {
            $file_path = storage_path() . '/app/' . $document->file;
            if (File::exists($file_path)) {
                unlink($file_path);
            }
        }
        $document->delete();

        return redirect()->route('staff.document.index')->with('success', "Data user '{$document->title}' berhasil dihapus");
    }
}
