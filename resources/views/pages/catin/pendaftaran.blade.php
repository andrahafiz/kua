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
@php
    $maritalStatuses = ['BELUM KAWIN', 'KAWIN', 'CERAI', 'HIDUP'];
@endphp
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

            <form action="{{ route('catin.married.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#jadwal"
                                                role="tab" aria-controls="home" aria-selected="true">Jadwal & Lokasi</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#suami"
                                                role="tab" aria-controls="contact" aria-selected="false">Calon Suami</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#istri"
                                                role="tab" aria-controls="profile" aria-selected="false">Calon Istri</a>
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
                                            @includeIf('pages.catin.page-jadwal')
                                        </div>
                                        <div class="tab-pane fade" id="istri" role="tabpanel"
                                            aria-labelledby="profile-tab3">
                                            @includeIf('pages.catin.page-data-istri')
                                        </div>

                                        <div class="tab-pane fade" id="suami" role="tabpanel"
                                            aria-labelledby="contact-tab3">
                                            @includeIf('pages.catin.page-data-suami')
                                        </div>

                                        <div class="tab-pane fade" id="dokumen" role="tabpanel"
                                            aria-labelledby="contact-tab3">
                                            @includeIf('pages.catin.page-data-dokumen')
                                        </div>

                                        <div class="tab-pane fade" id="pembayaran" role="tabpanel"
                                            aria-labelledby="contact-tab3">
                                            @includeIf('pages.catin.page-data-pembayaran')
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer pt-0">
                                    <hr />
                                    @if ($married->status > 2)
                                        <button class="btn btn-icon btn-lg icon-left btn-warning btn-block">
                                            <i class="fas fa-exclamation-triangle"></i> Data anda sudah validasi oleh
                                            staff kami. Data tidak dapat diubah lagi</button>
                                    @else
                                        {{-- <button type="submit" class="btn btn-primary">Simpan Data</button> --}}
                                        <button type="submit" name="action" class="btn btn-info"
                                            value="simpan">Simpan</button>
                                        <button type="submit" name="action" class="btn btn-primary"
                                            value="daftar">Daftar</button>
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
    <script>
        $(document).ready(function() {
            function toggleFatherHusbandFields() {
                var isChecked = $('#is_unknown_father_husband').is(":checked");
                var fields = [
                    '#citizen_father_husband',
                    '#nationality_father_husband',
                    '#nik_father_husband',
                    '#no_passport_father_husband',
                    '#location_birth_father_husband',
                    '#date_birth_father_husband',
                    '#religion_father_husband',
                    '#job_father_husband',
                    '#address_father_husband'
                ];

                fields.forEach(function(field) {
                    $(field).attr('disabled', isChecked);
                });
            }

            toggleFatherHusbandFields();

            $('#is_unknown_father_husband').change(toggleFatherHusbandFields);

            $('#imageHusband').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImageHusband').attr('src', e.target.result);
                }
                console.log(e.target.files[0]);
                reader.readAsDataURL(e.target.files[0]);
            })

            $('#imageWife').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImageWife').attr('src', e.target.result);
                }
                console.log(e.target.files[0]);
                reader.readAsDataURL(e.target.files[0]);
            })
        });
    </script>
@endpush
