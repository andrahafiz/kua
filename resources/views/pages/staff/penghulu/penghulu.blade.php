@extends('layouts.app-staff')

@section('title', 'Penghulu')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/chocolat/dist/css/chocolat.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Penghulu</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">Penghulu</div>
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
                                <h4>Data Penghulu</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table align-middle" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    No
                                                </th>
                                                <th>Photo</th>
                                                <th>Nama</th>
                                                <th>No HP</th>
                                                <th>Alamat</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($penghulus as $penghulu)
                                                <tr>
                                                    <td class="text-center align-middle">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="chocolat-parent">
                                                            <a href="{{ $penghulu->photo == 'avatar-1.png' ? asset('img/avatar/avatar-1.png') : Helper::setUrlImage($penghulu->photo, 'avatar/avatar-1.png') }}"
                                                                class="chocolat-image">
                                                                <img alt="{{ 'Photo ' . $penghulu->name_penghulu }}"
                                                                    src="{{ $penghulu->photo == 'avatar-1.png' ? asset('img/avatar/avatar-1.png') : Helper::setUrlImage($penghulu->photo, 'avatar/avatar-1.png') }}"
                                                                    class="rounded-circle" data-toggle="tooltip"
                                                                    title="Wildan Ahdian" width="50">
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">{{ $penghulu->name_penghulu }}</td>
                                                    <td class="align-middle">{{ $penghulu->phone }}</td>
                                                    <td class="align-middle">{{ $penghulu->address }}</td>
                                                    <td class="align-middle">
                                                        @if ($penghulu->status == 1)
                                                            <span class="badge badge-success">Aktif</span>
                                                        @else
                                                            <span class="badge badge-danger">Non Aktif</span>
                                                        @endif
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
