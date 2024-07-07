@extends('layouts.app-kakua')

@section('title', 'Tambah Data Penghulu')

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
                <h1>Tambah Data Penghulu</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Penghulu</a></div>
                    <div class="breadcrumb-item">Tambah Data Penghulu</div>
                </div>
            </div>

            <div class="section-body">
                {{-- <h2 class="section-title">Tambah Data Penghulu</h2>
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
                <form method="POST" action="{{ route('kakua.penghulu.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4>Foto Profile</h4>
                                </div>
                                <div class="card-body">
                                    <div class="user-item">
                                        <img alt="image" src="{{ asset('img/avatar/avatar-4.png') }}" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-9">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4>Kelola Pengguna</h4>
                                </div>
                                <div class="card-body mt-4">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama
                                            Penghulu</label>
                                        <div class="col-sm-12 col-md-8">
                                            <input type="text" class="form-control" name='name_penghulu'
                                                value="{{ old('name_penghulu') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor
                                            HP</label>
                                        <div class="col-sm-12 col-md-8">
                                            <input type="text" class="form-control" name='phone'
                                                value="{{ old('phone') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</label>
                                        <div class="col-sm-12 col-md-8">
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Pilih Foto</label>
                                                <input type="file" name="photo" id="image-upload" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                                        <div class="col-sm-12 col-md-8">
                                            <textarea class="form-control" name="address" data-height="150" required="" style="height: 150px;">{{ old('address') }}</textarea>
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
