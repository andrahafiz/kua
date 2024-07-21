@extends('layouts.app-catin')

@section('title', 'Perceraian')

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
                <h1>Form Perceraian</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Beranda</a></div>
                    <div class="breadcrumb-item">Perceraian</div>
                </div>
            </div>

            <form action="{{ route('catin.perceraian.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
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
                    @if ($perceraian->status == 3 && $perceraian->reason_approval != null)
                        <div class="row">
                            <div class="col">
                                <div class="alert alert-danger alert-has-icon">
                                    <div class="alert-icon"><i class="far fa-lightbulb"></i>
                                    </div>
                                    <div class="alert-body">
                                        <div class="alert-title">Verifikasi Dokumen Perceraian Anda Ditolak</div>
                                        Alasan : {{ $perceraian->reason_approval }}<br />
                                        Mohon untuk melakukan pengupload ulang
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-22">
                            <div class="card">
                                @if ($married->status_married == 'Menikah' || $married->status_married == 'Cerai' || $married->status_married == 'Rujuk')
                                    <div class="card-body pb-0">
                                        <div class="section-title">Data Pernikahan</div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label>Nomor Akta Nikah</label>
                                                        <input type="text" class="form-control"readonly name="akta_nikah"
                                                            value="{{ $married->akta_nikah_number }}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Tanggal Akad</label>
                                                        <input type="date" class="form-control" readonly
                                                            value="{{ $married->akad_date_masehi->format('Y-m-d') }}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Waktu Akad</label>
                                                        <input type="time" class="form-control" readonly
                                                            value="{{ $married->akad_date_masehi->format('H:i') }}">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label>Provinsi</label>
                                                        <input type="text" class="form-control" value="RIAU" readonly>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Kabupaten/Kota</label>
                                                        <input type="text" class="form-control" value="SINGINGI"
                                                            readonly>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Kecamatan</label>
                                                        <input type="text" class="form-control" value="PANGEAN" readonly>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Nikah Di</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $married->married_on }}" readonly>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>KUA</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $married->kua }}" readonly>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Desa/Kelurahan/Wali Nagari</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $married->desa_location }}" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-0">
                                                    <label>Alamat Lokasi Akad Nikah</label>
                                                    <input type="text" class="form-control" readonly
                                                        value="{{ $married->akad_location }}">
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
                                                            value="{{ $married->husbands->name_husband }}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Nama Istri</label>
                                                        <input type="text" class="form-control"readonly
                                                            value="{{ $married->wives->name_wife }}">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Tempat Tanggal Lahir Suami</label>
                                                        <input type="text" class="form-control"readonly
                                                            value="{{ $married->husbands?->location_birth_husband . ', ' . $married->husbands->date_birth_husband?->isoFormat('dddd, D MMMM Y') }}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Tempat Tanggal Lahir Istri</label>
                                                        <input type="text" class="form-control"readonly
                                                            value="{{ $married->wives?->location_birth_wife . ', ' . $married->wives->date_birth_wife?->isoFormat('dddd, D MMMM Y') }}">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Alamat Suami</label>
                                                        <input type="text" class="form-control"readonly
                                                            value="{{ $married->husbands?->address_husband }}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Alamat Istri</label>
                                                        <input type="text" class="form-control"readonly
                                                            value="{{ $married->wives?->address_wife }}">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Nomor Telpon Suami</label>
                                                        <input type="text" class="form-control"readonly
                                                            value="{{ $married->husbands?->phone_number_husband ?? '-' }}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Nomor Telpon Istri</label>
                                                        <input type="text" class="form-control"readonly
                                                            value="{{ $married->wives?->phone_number_wife ?? '-' }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="section-title">Dokumen Perceraian</div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group mb-0">
                                                    <label for="surat_putusan">Surat Putusan
                                                        Pengadilan <span class="text-danger">*</span></label>
                                                    <input type="file"
                                                        class="form-control @error('surat_putusan') is-invalid @enderror"
                                                        @readonly($perceraian?->status == 2) id="surat_putusan" name="surat_putusan">
                                                    @error('surat_putusan')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                    <label class="d-block" for="surat_putusan">
                                                        @if ($perceraian?->surat_putusan != null)
                                                            <a href="{{ Helper::setUrlDocument('cerai/' . $perceraian->surat_putusan) }}"
                                                                target="blank">Lihat
                                                                Dokumen</a>
                                                        @endif
                                                    </label>
                                                </div>
                                                <div class="form-group mb-0">
                                                    <label for="surat_keterangan_hamil">Surat Keterangan Tidak
                                                        Hamil</label>
                                                    <input type="file"
                                                        class="form-control @error('surat_keterangan_hamil') is-invalid @enderror"
                                                        @readonly($perceraian?->status == 2) id="surat_keterangan_hamil"
                                                        name="surat_keterangan_hamil">
                                                    @error('surat_keterangan_hamil')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                    <label class="d-block" for="surat_keterangan_hamil">
                                                        @if ($perceraian?->surat_keterangan_hamil != null)
                                                            <a href="{{ Helper::setUrlDocument('cerai/' . $perceraian->surat_keterangan_hamil) }}"
                                                                target="blank">Lihat
                                                                Dokumen</a>
                                                        @endif
                                                    </label>
                                                </div>
                                                <div class="form-group mb-0">
                                                    <label for="berita_acara_mediasi">Berita Acara Mediasi</label>
                                                    <input type="file"
                                                        class="form-control @error('berita_acara_mediasi') is-invalid @enderror"
                                                        @readonly($perceraian?->status == 2) id="berita_acara_mediasi"
                                                        name="berita_acara_mediasi">
                                                    @error('berita_acara_mediasi')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                    <label class="d-block" for="berita_acara_mediasi">
                                                        @if ($perceraian?->berita_acara_mediasi != null)
                                                            <a href="{{ Helper::setUrlDocument('cerai/' . $perceraian->berita_acara_mediasi) }}"
                                                                target="blank">Lihat
                                                                Dokumen</a>
                                                        @endif
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer pt-0">
                                        <hr />
                                        @if ($perceraian?->status == 2)
                                            <button class="btn btn-icon btn-lg icon-left btn-warning btn-block">
                                                <i class="fas fa-exclamation-triangle"></i> Data anda sudah validasi oleh
                                                staff kami. Data tidak dapat diubah lagi</button>
                                        @else
                                            <button type="submit"
                                                class="btn btn-icon btn-lg icon-left btn-primary btn-block">
                                                <i class="fas fa-check"></i> Ajukan Perceraian</button>
                                        @endif
                                    </div>
                                @else
                                    <div class="card-body text-center">
                                        <h3>Halaman ini belum di buka</h3>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
    <script src="{{ asset('js/form-regis.js') }}"></script>
@endpush
