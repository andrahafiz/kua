@extends('layouts.app-kakua')

@section('title', 'Data Rujuk')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/chocolat/dist/css/chocolat.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Rujuk</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">Data Rujuk</div>
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
                                <h4>Data Rujuk</h4>
                                <div class="card-header-action">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table align-middle" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">
                                                    No
                                                </th>
                                                <th class="text-center align-middle">No Akta Nikah</th>
                                                <th class="text-center align-middle">Nama Suami</th>
                                                <th class="text-center align-middle">Nama Istri</th>
                                                <th class="text-center align-middle">Tanggal Pengajuan</th>
                                                <th class="text-center align-middle">Tanggal Wawancara &<br />Verifikasi
                                                    Dokumen</th>
                                                <th class="text-center align-middle">Status</th>
                                                <th class="text-center align-middle">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center align-middle">
                                            @foreach ($rujuks as $rujuk)
                                                <tr>
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td>
                                                        <a
                                                            href="{{ route('kakua.married.show', $rujuk->married_id) }}">{{ $rujuk->married->akta_nikah_number ?? '-' }}</a>
                                                    </td>
                                                    <td>
                                                        {{ $rujuk->married->husbands?->name_husband ?? '-' }}
                                                    </td>
                                                    <td>{{ $rujuk->married->wives?->name_wife ?? '-' }}
                                                    </td>
                                                    <td>
                                                        {{ $rujuk->created_at?->isoFormat('dddd, D MMMM Y HH:mm') }}</td>
                                                    <td>
                                                        {{ $rujuk->tanggal_verifikasi?->isoFormat('dddd, D MMMM Y HH:mm') ?? 'Belum ditentukan' }}
                                                    </td>
                                                    <td>
                                                        <x-status-rujuk status="{{ $rujuk->status }}" />
                                                    </td>
                                                    <td width="10%">
                                                        <a href="{{ route('kakua.rujuk.show', $rujuk->id) }}"
                                                            class="btn btn-icon btn-sm btn-primary">
                                                            <i class="fas fa-circle-info"></i>
                                                        </a>
                                                        {{--  <a href="{{ route('admin.cerai.detail', $rujuk->slug) }}"
                                                            class="btn btn-icon btn-sm btn-info">
                                                            <i class="fas fa-circle-info"></i>
                                                        </a>
                                                        <form method="POST"
                                                            action="{{ route('admin.cerai.destroy', $rujuk->id) }}"
                                                            class="d-inline">
                                                            @csrf
                                                            {{ method_field('delete') }}
                                                            <button type="submit" class="btn btn-icon btn-sm btn-danger"
                                                                title='Delete'
                                                                onclick="return confirm('Data ini akan di hapus, anda yakin?')">
                                                                <i class="fas fa-trash"></i></button>
                                                        </form>
                                                        --}}
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
