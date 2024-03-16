@extends('layouts.app-catin')

@section('title', 'Pendaftaran')

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
                <h1>Form Pendaftaran</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Beranda</a></div>
                    <div class="breadcrumb-item">Pendaftaran</div>
                </div>
            </div>

            <form action="{{ route('catin.merried.store') }}" method="POST" enctype="multipart/form-data">
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
                                <div class="card-body">
                                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#jadwal"
                                                role="tab" aria-controls="home" aria-selected="true">Jadwal</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#istri"
                                                role="tab" aria-controls="profile" aria-selected="false">Calon Istri</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#suami"
                                                role="tab" aria-controls="contact" aria-selected="false">Calon Suami</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#dokumen"
                                                role="tab" aria-controls="contact" aria-selected="false">Upload
                                                Dokumen</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#pembayaran"
                                                role="tab" aria-controls="contact" aria-selected="false">Pembayaran</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent2">
                                        <div class="tab-pane fade show active" id="jadwal" role="tabpanel"
                                            aria-labelledby="home-tab3">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Tanggal Daftar</label>
                                                        <input type="text" class="form-control" readonly
                                                            value="{{ now()->format('Y-m-d') }}">
                                                    </div>
                                                    Rencana Pelaksanaan Akad Nikah
                                                    <div class="form-group">
                                                        <label>Nikah Di</label>
                                                        <input type="text" name="location_name"
                                                            value="{{ old('location_name') }}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tanggal Akad</label>
                                                        <div class="form-group row">
                                                            <div class="col-sm-5">
                                                                <input type="date" name="akad_date_masehi"
                                                                    class="form-control"
                                                                    value="{{ Carbon\Carbon::parse(old('akad_date_masehi'))->format('Y-m-d') }}">
                                                            </div>
                                                            <div class="col-sm-2">
                                                                Tahun Masehi
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <input type="time" name="akad_time_masehi"
                                                                    class="form-control"
                                                                    value="{{ old('akad_time_masehi') }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-5">
                                                                <input type="date" name="akad_date_hijriah"
                                                                    class="form-control"
                                                                    value="{{ Carbon\Carbon::parse(old('akad_date_hijriah'))->format('Y-m-d') }}"">
                                                            </div>
                                                            <div class="col-sm-2">
                                                                Tahun Hijriah
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <input type="time" name="akad_time_hijriah"
                                                                    class="form-control"
                                                                    value="{{ old('akad_time_hijriah') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Alamat Lokasi Akad Nikah</label>
                                                        <input type="text" name="akad_location" class="form-control"
                                                            value="{{ old('akad_location') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="istri" role="tabpanel"
                                            aria-labelledby="profile-tab3">
                                            <div class="data-istri">
                                                <div class="form-group row">
                                                    <label for="nationality_wife"
                                                        class="col-sm-3 col-lg-2 col-form-label">Kewarganegaraan</label>
                                                    <div class="col-sm-9 col-lg-10">
                                                        <select class="form-control" name="nationality_wife">
                                                            <option>Option 1</option>
                                                            <option value="IDN">Indonesia</option>
                                                            <option value="MLY">Malaysia</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="nik_wife"
                                                        class="col-sm-3 col-lg-2 col-form-label">NIK</label>
                                                    <div class="col-sm-9 col-lg-10">
                                                        <input type="text" class="form-control" id="nik_wife"
                                                            name="nik_wife" placeholder="NIK Istri"
                                                            value="{{ old('nik_wife') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="name_wife"
                                                        class="col-sm-3 col-lg-2 col-form-label">Nama</label>
                                                    <div class="col-sm-9 col-lg-10">
                                                        <input type="text" class="form-control" id="name_wife"
                                                            name="name_wife" placeholder="Nama Istri"
                                                            value="{{ old('name_wife') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="location_birth_wife"
                                                        class="col-sm-3 col-lg-2 col-form-label">Tempat
                                                        Lahir</label>
                                                    <div class="col-sm-9 col-lg-10">
                                                        <input type="text" class="form-control"
                                                            id="location_birth_wife" name="location_birth_wife"
                                                            placeholder="Tempat Lahir Istri"
                                                            value="{{ old('location_birth_wife') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="date_birth_wife"
                                                        class="col-sm-3 col-lg-2 col-form-label">Tanggal
                                                        Lahir</label>
                                                    <div class="col-sm-9 col-lg-10">
                                                        <input type="date" class="form-control" name="date_birth_wife"
                                                            id="date_birth_wife"
                                                            value="{{ Carbon\Carbon::parse(old('date_birth_wife'))->format('Y-m-d') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="old_wife"
                                                        class="col-sm-3 col-lg-2 col-form-label">Umur</label>
                                                    <div class="col-sm-9 col-lg-10">
                                                        <input type="number" class="form-control" id="old_wife"
                                                            name="old_wife" placeholder="Umur Istri"
                                                            value="{{ old('old_wife') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="status_wife"
                                                        class="col-sm-3 col-lg-2 col-form-label">Status</label>
                                                    <div class="col-sm-9 col-lg-10">
                                                        <input type="text" class="form-control" id="status_wife"
                                                            name="status_wife" placeholder="Status Istri"
                                                            value="{{ old('status_wife') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="religion_wife"
                                                        class="col-sm-3 col-lg-2 col-form-label">Agama</label>
                                                    <div class="col-sm-9 col-lg-10">
                                                        <input type="text" class="form-control" id="religion_wife"
                                                            name="religion_wife" placeholder="Agama Istri"
                                                            value="{{ old('religion_wife') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="address_wife"
                                                        class="col-sm-3 col-lg-2 col-form-label">Alamat</label>
                                                    <div class="col-sm-9 col-lg-10">
                                                        <input type="text" class="form-control" id="address_wife"
                                                            name="address_wife" placeholder="Alamat Istri"
                                                            value="{{ old('address_wife') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="suami" role="tabpanel"
                                            aria-labelledby="contact-tab3">
                                            <div class="data-suami">
                                                <div class="form-group row">
                                                    <label for="nationality_husband"
                                                        class="col-sm-3 col-lg-2 col-form-label">Kewarganegaraan</label>
                                                    <div class="col-sm-9 col-lg-10">
                                                        <select class="form-control" name="nationality_husband">
                                                            <option>Option 1</option>
                                                            <option value="IDN">Indonesia</option>
                                                            <option value="MLY">Malaysia</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="nik_husband"
                                                        class="col-sm-3 col-lg-2 col-form-label">NIK</label>
                                                    <div class="col-sm-9 col-lg-10">
                                                        <input type="text" class="form-control" id="nik_husband"
                                                            placeholder="NIK Suami" name="nik_husband"
                                                            value="{{ old('nik_husband') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="name_husband"
                                                        class="col-sm-3 col-lg-2 col-form-label">Nama</label>
                                                    <div class="col-sm-9 col-lg-10">
                                                        <input type="text" class="form-control" id="name_husband"
                                                            placeholder="Nama Suami" name="name_husband"
                                                            value="{{ old('name_husband') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="location_birth_husband"
                                                        class="col-sm-3 col-lg-2 col-form-label">Tempat
                                                        Lahir</label>
                                                    <div class="col-sm-9 col-lg-10">
                                                        <input type="text" class="form-control"
                                                            id="location_birth_husband" name="location_birth_husband"
                                                            placeholder="Tempat Lahir Suami"
                                                            value="{{ old('location_birth_husband') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="date_birth_husband"
                                                        class="col-sm-3 col-lg-2 col-form-label">Tanggal
                                                        Lahir</label>
                                                    <div class="col-sm-9 col-lg-10">
                                                        <input type="date" class="form-control"
                                                            id="date_birth_husband" name="date_birth_husband"
                                                            value="{{ Carbon\Carbon::parse(old('date_birth_husband'))->format('Y-m-d') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="old_husband"
                                                        class="col-sm-3 col-lg-2 col-form-label">Umur</label>
                                                    <div class="col-sm-9 col-lg-10">
                                                        <input type="number" name="old_husband" class="form-control"
                                                            id="old_husband" placeholder="Umur Suami"
                                                            value="{{ old('old_husband') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="status_husband"
                                                        class="col-sm-3 col-lg-2 col-form-label">Status</label>
                                                    <div class="col-sm-9 col-lg-10">
                                                        <input type="text" class="form-control" id="status_husband"
                                                            placeholder="Status Suami" name="status_husband"
                                                            value="{{ old('status_husband') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="religion_husband"
                                                        class="col-sm-3 col-lg-2 col-form-label">Agama</label>
                                                    <div class="col-sm-9 col-lg-10">
                                                        <input type="text" class="form-control" id="religion_husband"
                                                            placeholder="Agama Suami" name="religion_husband"
                                                            value="{{ old('religion_husband') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="address_husband"
                                                        class="col-sm-3 col-lg-2 col-form-label">Alamat</label>
                                                    <div class="col-sm-9 col-lg-10">
                                                        <input type="text" class="form-control" id="address_husband"
                                                            placeholder="Alamat Suami" name="address_husband"
                                                            value="{{ old('address_husband') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="dokumen" role="tabpanel"
                                            aria-labelledby="contact-tab3">
                                            <div class="data-suami">
                                                <div class="form-group row">
                                                    <label for="N1"
                                                        class="col-sm-4 col-lg-3 col-form-label">N1-Surat
                                                        Keterangan Untuk Nikah (Dari Kelurahan) *</label>
                                                    <div class="col-sm-8 col-lg-9">
                                                        <input type="file" class="form-control" id="N1"
                                                            name="N1">
                                                        <label class="" for="N1"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="N3" class="col-sm-4 col-lg-3 col-form-label">N3-Surat
                                                    Persetujuan Mempelai *</label>
                                                <div class="col-sm-8 col-lg-9">
                                                    <input type="file" class="form-control" id="N3"
                                                        name="N3">
                                                    <label class="" for="N3"></label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="N5" class="col-sm-4 col-lg-3 col-form-label">N5-Surat
                                                    Izin
                                                    Orang Tua (Jika calon pengantin umurnya dibawah 21 Tahun)</label>
                                                <div class="col-sm-8 col-lg-9">
                                                    <input type="file" class="form-control" id="N5"
                                                        name="N5">
                                                    <label class="" for="N5"></label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="surat_akta_cerai"
                                                    class="col-sm-4 col-lg-3 col-form-label">Surat
                                                    Akta Cerai (Jika calon pengantin sudah cerai)</label>
                                                <div class="col-sm-8 col-lg-9">
                                                    <input type="file" class="form-control" id="surat_akta_cerai"
                                                        name="surat_akta_cerai">
                                                    <label class="" for="surat_akta_cerai"></label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="surat_izin_komandan"
                                                    class="col-sm-4 col-lg-3 col-form-label">Surat Izin Komandan (Jika
                                                    calon
                                                    pengantin TNI atau POLRI)</label>
                                                <div class="col-sm-8 col-lg-9">
                                                    <input type="file" class="form-control" id="surat_izin_komandan"
                                                        name="surat_izin_komandan">
                                                    <label class="" for="surat_izin_komandan"></label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="ktp_husband"
                                                    class="col-sm-4 col-lg-3 col-form-label">Identitas
                                                    Diri (KTP *)</label>
                                                <div class="col-sm-8 col-lg-9">
                                                    <input type="file" class="form-control" id="ktp_husband"
                                                        name="ktp_husband">
                                                    <label class="" for="ktp_husband"></label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="kk_husband" class="col-sm-4 col-lg-3 col-form-label">Kartu
                                                    Keluarga *</label>
                                                <div class="col-sm-8 col-lg-9">
                                                    <input type="file" class="form-control" id="kk_husband"
                                                        name="kk_husband">
                                                    <label class="" for="kk_husband"></label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="akta_husband" class="col-sm-4 col-lg-3 col-form-label">Akta
                                                    Kelahiran *</label>
                                                <div class="col-sm-8 col-lg-9">
                                                    <input type="file" class="form-control" id="akta_husband"
                                                        name="akta_husband">
                                                    <label class="" for="akta_husband"></label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="ijazah_husband"
                                                    class="col-sm-4 col-lg-3 col-form-label">Ijazah
                                                    *</label>
                                                <div class="col-sm-8 col-lg-9">
                                                    <input type="file" class="form-control" id="ijazah_husband"
                                                        name="ijazah_husband">
                                                    <label class="" for="ijazah_husband"></label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="photo_husband" class="col-sm-4 col-lg-3 col-form-label">Photo
                                                    (Latar Biru) *</label>
                                                <div class="col-sm-8 col-lg-9">
                                                    <input type="file" class="form-control" id="photo_husband"
                                                        name="photo_husband">
                                                    <label class="" for="photo_husband"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pembayaran" role="tabpanel"
                                            aria-labelledby="contact-tab3">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="empty-state pb-0">
                                                        <div class="empty-state-icon">
                                                            <i class="fas fa-credit-card"></i>
                                                        </div>
                                                        <h2>Pembayaran</h2>
                                                        <div class="lead">
                                                            <div class="form-group row">
                                                                <label for="inputEmail3"
                                                                    class="col-sm-4 col-form-label">Metode
                                                                    Pembayaran</label>
                                                                <div class="col-sm-8">
                                                                    <select class="custom-select">
                                                                        <option selected="">Pilih Metode Pembayaran
                                                                        </option>
                                                                        <option value="BNI">BNI</option>
                                                                        <option value="BRI">BRI</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="code_billing"
                                                                    class="col-sm-4 col-form-label">Kode
                                                                    Billing</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="code_billing" placeholder="Kode Billing">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="code_billing"
                                                                    class="col-sm-4 col-form-label">Upload Bukti
                                                                    Pembayaran</label>
                                                                <div class="col-sm-8">
                                                                    <input type="file" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <hr />
                                    <button type="submit" class="btn btn-primary">Simpan Data</button>
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
@endpush
