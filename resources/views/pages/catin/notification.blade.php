@extends('layouts.app-catin')

@section('title', 'Notifikasi')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/chocolat/dist/css/chocolat.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Notifikasi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">Notifikasi</div>
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
                                <h4>Notifikasi</h4>

                            </div>
                            <div class="card-body">
                                <div class="float-right mb-3">
                                    <a href="{{ route('catin.married.notification.read') }}" class="btn btn-primary">
                                        Baca Semua Pesan
                                    </a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table-striped table align-middle text-center" id="table-1">
                                        <thead>
                                            <tr>
                                                <th style="width: 10%;">
                                                    No
                                                </th>
                                                <th style="width: 20%;">Tanggal</th>
                                                <th style="width: 10%;">Status</th>
                                                <th>Deskripsi</th>
                                                <th>Read ?</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($notifications as $notification)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        {{ $notification->created_at?->isoFormat('dddd, D MMMM Y H:m') }}
                                                    </td>
                                                    <td>
                                                        <div class="badge badge-{{ $notification->type }}">
                                                            {{ $notification->message }}
                                                        </div>
                                                    </td>
                                                    <td class="font-weight-600"> {{ $notification->description }}</td>
                                                    <td>
                                                        @if ($notification->is_read == true)
                                                            <a class="btn btn-icon btn-sm btn-primary text-center disabled"><i
                                                                    class="fas fa-envelope-open"></i></a>
                                                        @else
                                                            <a href="{{ route('catin.married.notification.read', $notification->id) }}"
                                                                class="btn btn-icon btn-sm btn-primary text-center"><i
                                                                    class="fas fa-envelope"></i></a>
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
