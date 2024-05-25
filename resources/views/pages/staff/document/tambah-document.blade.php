@extends('layouts.app-staff')

@section('title', 'Tambah Data Dokumen')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Tambah Data Dokumen</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dokumen</a></div>
                    <div class="breadcrumb-item">Tambah Data Dokumen</div>
                </div>
            </div>

            <div class="section-body">
                {{-- <h2 class="section-title">Tambah Data Dokumen</h2>
                <p class="section-lead">
                    On this page you can create a new post and fill in all fields.
                </p> --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('staff.document.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 ">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4>Kelola Pengguna</h4>
                                </div>
                                <div class="card-body mt-4">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul
                                            Dokumen</label>
                                        <div class="col-sm-12 col-md-8">
                                            <input type="text" class="form-control" name='title'
                                                value="{{ old('title') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor
                                            Dokumen</label>
                                        <div class="col-sm-12 col-md-8">
                                            <input type="text" class="form-control" name='number_document'
                                                value="{{ old('number_document') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Dokumen</label>
                                        <div class="col-sm-12 col-md-8">
                                            <div>
                                                <input type="file" name="file" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-8">
                                            <button class="btn btn-primary btn-lg btn-block" type="submit">Tambah
                                                Data</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/upload-preview/upload-preview.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-post-create.js') }}"></script>
@endpush
