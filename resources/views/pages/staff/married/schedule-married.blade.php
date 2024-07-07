@extends('layouts.app-staff')

@section('title', 'Data Pernikahan')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/chocolat/dist/css/chocolat.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Jadwal Pernikahan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">Jadwal Pernikahan</div>
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
                                <h4>Jadwal Pernikahan</h4>
                                <div class="card-header-action">
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
                                                <th>Nomor Pendaftaran</th>
                                                <th>Nama Pengantin</th>
                                                <th>Tanggal</th>
                                                <th>Waktu</th>
                                                <th>Penghulu</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($marrieds as $married)
                                                <tr>
                                                    <td class="text-center align-middle">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td class="align-middle">{{ $married->registration_number }}</td>
                                                    <td class="align-middle">{{ $married->husbands?->name_husband }} &
                                                        {{ $married->wives?->name_wife }}</td>
                                                    <td class="align-middle">
                                                        {{ $married->akad_date_masehi?->isoFormat('dddd, D MMMM Y') }}</td>
                                                    <td class="align-middle">
                                                        {{ $married->akad_date_masehi?->isoFormat('H:m') }}</td>
                                                    <td class="align-middle">{{ $married->penghulu->name_penghulu }}</td>
                                                    <td width="10%" class="align-middle">
                                                        <a href="{{ route('staff.married.show', $married->id) }}"
                                                            class="btn btn-icon btn-sm btn-primary">
                                                            <i class="fas fa-circle-info"></i>
                                                        </a>
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
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script>
        $("#table-1").dataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [6, 7, 8]
            }]
        });
    </script>
@endpush
