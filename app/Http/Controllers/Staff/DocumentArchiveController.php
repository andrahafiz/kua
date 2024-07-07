<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\ArchiveDocument;
use Illuminate\Http\Request;

class DocumentArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cerai()
    {
        $documents = ArchiveDocument::where('type_document', 'cerai')
            ->orderBy('married_id', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view(
            'pages.staff.archive.cerai',
            ['type_menu' => 'document', 'documents' => $documents]
        );
    }

    public function rujuk()
    {
        $documents = ArchiveDocument::where('type_document', 'rujuk')
            ->orderBy('married_id', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view(
            'pages.staff.archive.rujuk',
            ['type_menu' => 'document', 'documents' => $documents]
        );
    }
}
