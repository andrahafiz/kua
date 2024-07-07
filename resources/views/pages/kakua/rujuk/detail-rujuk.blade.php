@extends('layouts.app-kakua')

@section('title', 'Rujuk')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush
@section('main')

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Rujuk</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Beranda</a></div>
                    <div class="breadcrumb-item">Rujuk</div>
                </div>
            </div>

            <form action="{{ route('kakua.rujuk.approval', $rujuk->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="section-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-22">
                            <div class="card">
                                <div class="card-body">
                                    <div class="section-title">Data Pernikahan</div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label>Nomor Akta Nikah</label>
                                                    <input type="text" class="form-control"readonly name="akta_nikah"
                                                        value="{{ $rujuk->married->akta_nikah_number }}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Tanggal Akad</label>
                                                    <input type="date" class="form-control" readonly
                                                        value="{{ $rujuk->married->akad_date_masehi->format('Y-m-d') }}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Waktu Akad</label>
                                                    <input type="time" class="form-control" readonly
                                                        value="{{ $rujuk->married->akad_date_masehi->format('H:i') }}">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label>Provinsi</label>
                                                    <input type="text" class="form-control" value="RIAU" readonly>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Kabupaten/Kota</label>
                                                    <input type="text" class="form-control" value="SINGINGI" readonly>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Kecamatan</label>
                                                    <input type="text" class="form-control" value="PANGEAN" readonly>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Nikah Di</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $rujuk->married->married_on }}" readonly>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>KUA</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $rujuk->married->kua }}" readonly>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Desa/Kelurahan/Wali Nagari</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $rujuk->married->desa_location }}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group mb-0">
                                                <label>Alamat Lokasi Akad Nikah</label>
                                                <input type="text" class="form-control" readonly
                                                    value="{{ $rujuk->married->akad_location }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="section-title">Data Mempelai</div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Nama Suami</label>
                                                    <input type="text" class="form-control"readonly
                                                        value="{{ $rujuk->married->husbands->name_husband }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Nama Istri</label>
                                                    <input type="text" class="form-control"readonly
                                                        value="{{ $rujuk->married->wives->name_wife }}">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Tempat Tanggal Lahir Suami</label>
                                                    <input type="text" class="form-control"readonly
                                                        value="{{ $rujuk->married->husbands?->location_birth_husband . ', ' . $rujuk->married->husbands->date_birth_husband?->isoFormat('dddd, D MMMM Y') }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Tempat Tanggal Lahir Istri</label>
                                                    <input type="text" class="form-control"readonly
                                                        value="{{ $rujuk->married->wives?->location_birth_wife . ', ' . $rujuk->married->wives->date_birth_wife?->isoFormat('dddd, D MMMM Y') }}">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Alamat Suami</label>
                                                    <input type="text" class="form-control"readonly
                                                        value="{{ $rujuk->married->husbands?->address_husband }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Alamat Istri</label>
                                                    <input type="text" class="form-control"readonly
                                                        value="{{ $rujuk->married->wives?->address_wife }}">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Nomor Telpon Suami</label>
                                                    <input type="text" class="form-control"readonly
                                                        value="{{ $rujuk->married->husbands?->phone_number_husband ?? '-' }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Nomor Telpon Istri</label>
                                                    <input type="text" class="form-control"readonly
                                                        value="{{ $rujuk->married->wives?->phone_number_wife ?? '-' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="section-title">Data Rujuk</div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group mb-0">
                                                <label for="tanggal_verifikasi">Tanggal Wawancara & Verifikasi
                                                    Dokumen</label>
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="date" class="form-control" disabled
                                                            value="{{ $rujuk->tanggal_verifikasi?->format('Y-m-d') }}">
                                                    </div>
                                                    <div class="col">
                                                        <input type="time" class="form-control" disabled
                                                            value="{{ $rujuk->tanggal_verifikasi?->format('H:i') }}">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group mb-0">
                                                <h6 for="berita_acara">Berita Acara</h6>
                                                @if ($rujuk?->berita_acara != null && $rujuk?->status == 2)
                                                    <h3 for="berita_acara">
                                                        @if ($rujuk?->berita_acara != null)
                                                            <a href="{{ Helper::setUrlDocument('rujuk/' . $rujuk->berita_acara) }}"
                                                                target="blank">Lihat
                                                                Dokumen</a>
                                                        @endif
                                                    </h3>
                                                @else
                                                    <h3 for="berita_acara">
                                                        Tidak Tersedia
                                                    </h3>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="section-title">Dokumen Rujuk</div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group mb-3">
                                                <h6 class="fw-bold" for="ktp_husband">KTP Suami</h6>
                                                <label class="d-block" for="ktp_husband">
                                                    @if ($rujuk?->ktp_husband != null)
                                                        <a href="{{ Helper::setUrlDocument('rujuk/' . $rujuk->ktp_husband) }}"
                                                            target="blank">Lihat
                                                            Dokumen</a>
                                                    @endif
                                                </label>
                                            </div>
                                            <div class="form-group mb-3">
                                                <h6 class="fw-bold" for="ktp_wife">KTP Istri</h6>
                                                <label class="d-block" for="ktp_wife">
                                                    @if ($rujuk?->ktp_wife != null)
                                                        <a href="{{ Helper::setUrlDocument('rujuk/' . $rujuk->ktp_wife) }}"
                                                            target="blank">Lihat
                                                            Dokumen</a>
                                                    @endif
                                                </label>
                                            </div>
                                            <div class="form-group mb-3">
                                                <h6 class="fw-bold" for="akta_cerai">Akta Cerai</h6>
                                                <label class="d-block" for="akta_cerai">
                                                    @if ($rujuk?->akta_cerai != null)
                                                        <a href="{{ Helper::setUrlDocument('rujuk/' . $rujuk->akta_cerai) }}"
                                                            target="blank">Lihat
                                                            Dokumen</a>
                                                    @endif
                                                </label>
                                            </div>
                                            <div class="form-group mb-3">
                                                <h6 class="fw-bold" for="buku_nikah">Buku Nikah</h6>
                                                <label class="d-block" for="buku_nikah">
                                                    @if ($rujuk?->buku_nikah != null)
                                                        <a href="{{ Helper::setUrlDocument('rujuk/' . $rujuk->buku_nikah) }}"
                                                            target="blank">Lihat
                                                            Dokumen</a>
                                                    @endif
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
