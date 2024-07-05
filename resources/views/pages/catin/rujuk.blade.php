@extends('layouts.app-catin')

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
                <h1>Form Rujuk</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Beranda</a></div>
                    <div class="breadcrumb-item">Rujuk</div>
                </div>
            </div>

            <form action="{{ route('catin.rujuk.store') }}" method="POST" enctype="multipart/form-data">
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
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-22">
                            <div class="card">
                                <div class="card-body pb-0">
                                    @if ($married->status_married == 'Cerai' || $married->status_married == 'Rujuk')
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

                                        <div class="section-title">Dokumen Rujuk</div>
                                        <div class="row">
                                            <div class="col">
                                                @if ($rujuk?->tanggal_verifikasi != null && $rujuk?->status == 2)
                                                    <div class="form-group mb-0">
                                                        <h6 for="tanggal_verifikasi">Tanggal Verifikasi & Wawancara</h6>
                                                        <label class="d-block" for="tanggal_verifikasi">
                                                            @if ($rujuk?->tanggal_verifikasi != null)
                                                                <span>
                                                                    {{ $rujuk->tanggal_verifikasi?->isoFormat('dddd, D MMMM Y HH:mm') ?? 'Belum ditentukan' }}

                                                                </span>
                                                            @endif
                                                        </label>
                                                    </div>
                                                @endif
                                                @if ($rujuk?->berita_acara != null && $rujuk?->status == 2)
                                                    <div class="form-group mb-0">
                                                        <h6 for="berita_acara">Berita Acara</h6>
                                                        <label class="d-block" for="berita_acara">
                                                            @if ($rujuk?->berita_acara != null)
                                                                <a href="{{ Helper::setUrlDocument('rujuk/' . $rujuk->berita_acara) }}"
                                                                    target="blank">Lihat
                                                                    Dokumen</a>
                                                            @endif
                                                        </label>
                                                    </div>
                                                @endif
                                                <div class="form-group mb-0">
                                                    @if ($rujuk?->ktp_husband != null && $rujuk?->status == 2)
                                                        <h6 for="ktp_husband">KTP Suami</h6>
                                                        <label class="d-block" for="ktp_husband">
                                                            @if ($rujuk?->ktp_husband != null)
                                                                <a href="{{ Helper::setUrlDocument('rujuk/' . $rujuk->ktp_husband) }}"
                                                                    target="blank">Lihat
                                                                    Dokumen</a>
                                                            @endif
                                                        </label>
                                                    @else
                                                        <label for="ktp_husband">KTP Suami<span
                                                                class="text-danger">*</span></label>
                                                        <input type="file"
                                                            class="form-control @error('ktp_husband') is-invalid @enderror"
                                                            @readonly($rujuk?->status == 2) id="ktp_husband" name="ktp_husband">
                                                        @error('ktp_husband')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                        <label class="d-block" for="ktp_husband">
                                                            @if ($rujuk?->ktp_husband != null)
                                                                <a href="{{ Helper::setUrlDocument('rujuk/' . $rujuk->ktp_husband) }}"
                                                                    target="blank">Lihat
                                                                    Dokumen</a>
                                                            @endif
                                                        </label>
                                                    @endif
                                                </div>

                                                <div class="form-group mb-0">
                                                    @if ($rujuk?->ktp_wife != null && $rujuk?->status == 2)
                                                        <h6 for="ktp_wife">KTP Suami</h6>
                                                        <label class="d-block" for="ktp_wife">
                                                            @if ($rujuk?->ktp_wife != null)
                                                                <a href="{{ Helper::setUrlDocument('rujuk/' . $rujuk->ktp_wife) }}"
                                                                    target="blank">Lihat
                                                                    Dokumen</a>
                                                            @endif
                                                        </label>
                                                    @else
                                                        <label for="ktp_wife">KTP Istri<span
                                                                class="text-danger">*</span></label>
                                                        <input type="file"
                                                            class="form-control @error('ktp_wife') is-invalid @enderror"
                                                            @readonly($rujuk?->status == 2) id="ktp_wife" name="ktp_wife">
                                                        @error('ktp_wife')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                        <label class="d-block" for="ktp_wife">
                                                            @if ($rujuk?->ktp_wife != null)
                                                                <a href="{{ Helper::setUrlDocument('rujuk/' . $rujuk->ktp_wife) }}"
                                                                    target="blank">Lihat
                                                                    Dokumen</a>
                                                            @endif
                                                        </label>
                                                    @endif
                                                </div>

                                                <div class="form-group mb-0">
                                                    @if ($rujuk?->buku_nikah != null && $rujuk?->status == 2)
                                                        <h6 for="buku_nikah">Buku Nikah</h6>
                                                        <label class="d-block" for="buku_nikah">
                                                            @if ($rujuk?->buku_nikah != null)
                                                                <a href="{{ Helper::setUrlDocument('rujuk/' . $rujuk->buku_nikah) }}"
                                                                    target="blank">Lihat
                                                                    Dokumen</a>
                                                            @endif
                                                        </label>
                                                    @else
                                                        <label for="buku_nikah">Buku Nikah</label>
                                                        <input type="file"
                                                            class="form-control @error('buku_nikah') is-invalid @enderror"
                                                            @readonly($rujuk?->status == 2) id="buku_nikah" name="buku_nikah">
                                                        @error('buku_nikah')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                        <label class="d-block" for="buku_nikah">
                                                            @if ($rujuk?->buku_nikah != null)
                                                                <a href="{{ Helper::setUrlDocument('rujuk/' . $rujuk->buku_nikah) }}"
                                                                    target="blank">Lihat
                                                                    Dokumen</a>
                                                            @endif
                                                        </label>
                                                    @endif
                                                </div>

                                                <div class="form-group mb-0">
                                                    @if ($rujuk?->akta_cerai != null && $rujuk?->status == 2)
                                                        <h6 for="akta_cerai">Akta Cerai</h6>
                                                        <label class="d-block" for="akta_cerai">
                                                            @if ($rujuk?->akta_cerai != null)
                                                                <a href="{{ Helper::setUrlDocument('rujuk/' . $rujuk->akta_cerai) }}"
                                                                    target="blank">Lihat
                                                                    Dokumen</a>
                                                            @endif
                                                        </label>
                                                    @else
                                                        <label for="akta_cerai">Akta Cerai</label>
                                                        <input type="file"
                                                            class="form-control @error('akta_cerai') is-invalid @enderror"
                                                            @readonly($rujuk?->status == 2) id="akta_cerai" name="akta_cerai">
                                                        @error('akta_cerai')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                        <label class="d-block" for="akta_cerai">
                                                            @if ($rujuk?->akta_cerai != null)
                                                                <a href="{{ Helper::setUrlDocument('rujuk/' . $rujuk->akta_cerai) }}"
                                                                    target="blank">Lihat
                                                                    Dokumen</a>
                                                            @endif
                                                        </label>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        Halaman ini belum di buka
                                    @endif

                                </div>
                                <div class="card-footer pt-0">
                                    <hr />
                                    @if ($rujuk?->status == 2)
                                        <button class="btn btn-icon btn-lg icon-left btn-warning btn-block">
                                            <i class="fas fa-exclamation-triangle"></i> Data anda sudah validasi oleh
                                            staff kami. Data tidak dapat diubah lagi</button>
                                    @else
                                        <button type="submit"
                                            class="btn btn-icon btn-lg icon-left btn-primary btn-block">
                                            <i class="fas fa-check"></i> Ajukan Rujuk</button>
                                    @endif
                                </div>
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
