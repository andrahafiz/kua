@extends('layouts.app-staff')

@section('title', 'Dokumen')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/chocolat/dist/css/chocolat.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dokumen</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">Dokumen</div>
                </div>
            </div>
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible alert-has-icon show fade">
                    <div class="alert-icon"><i class="far fa-circle-check"></i></div>
                    <div class="alert-body">
                        <div class="alert-title">Sukses</div>
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        {{ session('success') }}!
                    </div>
                </div>
            @endif
            @error('error')
                <div class="alert alert-danger alert-dismissible alert-has-icon show fade">
                    <div class="alert-icon"><i class="far fa-circle-xmark"></i></div>
                    <div class="alert-body">
                        <div class="alert-title">Gagal</div>
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        {{ $message }}.
                    </div>
                </div>
            @enderror
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Data Dokumen</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('staff.document.create') }}" class="btn btn-primary">
                                        Tambah Data Dokumen
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table align-middle" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    No
                                                </th>
                                                <th>Nomor Dokumen</th>
                                                <th>Judul Dokumen</th>
                                                <th>File</th>
                                                <th>Tanggal Upload</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($documents as $document)
                                                <tr>
                                                    <td class="text-center align-middle">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $document->number_document }}
                                                    </td>
                                                    <td class="align-middle">{{ $document->title }}</td>
                                                    <td class="align-middle">
                                                        <a
                                                            href="{{ asset('storage/files/document/' . str_replace('public/files/document/', '', $document->file)) }}">Lihat
                                                            File</a>
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $document->created_at?->isoFormat('dddd, D MMMM Y') ?? '-' }}
                                                    </td>
                                                    <td width="10%" class="align-middle">
                                                        <a href="{{ route('staff.document.edit', $document->id) }}"
                                                            class="btn btn-icon btn-sm btn-primary">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form method="POST"
                                                            action="{{ route('staff.document.destroy', $document->id) }}"
                                                            class="d-inline">
                                                            @csrf
                                                            {{ method_field('delete') }}
                                                            <button type="submit" class="btn btn-icon btn-sm btn-danger"
                                                                title='Delete'
                                                                onclick="return confirm('Data ini akan di hapus, anda yakin?')">
                                                                <i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>
    {{-- <script src="{{ asset('js/page/modules-datatables.js') }}"></script> --}}
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script>
        $("#table-1").dataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [0, 1, 5]
            }]
        });
    </script>
@endpush
