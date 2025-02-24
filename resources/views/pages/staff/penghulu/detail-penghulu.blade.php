@extends('layouts.app-staff')

@section('title', 'Detail Data User')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/chocolat/dist/css/chocolat.css') }}">
    <style>
        .text-default {
            color: #34395e;
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ url()->previous() }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Detail Data User</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('admin.produk.index') }}">User</a></div>
                    <div class="breadcrumb-item">Detail Data User</div>
                </div>
            </div>

            <div class="section-body">
                {{-- <h2 class="section-title">Detail Data User</h2>
                <p class="section-lead">
                    On this page you can create a new post and fill in all fields.
                </p> --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            {{-- <div class="card-header">
                                <h4>My Picture</h4>
                                <div class="card-header-action">
                                    <a href="#" class="btn btn-primary">View All</a>
                                </div>
                            </div> --}}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="chocolat-parent">
                                            <a href="{{ Helper::setUrlImage($product->image) }}" class="chocolat-image"
                                                title="Foto User {{ $product->name }}">
                                                <div>
                                                    <img alt="image" src="{{ Helper::setUrlImage($product->image) }}"
                                                        class="img-fluid img-thumbnail">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-6 text-default">
                                        <h1>{{ $product->name_product }}</h1>
                                        <h6 class="">
                                            <span class="text-muted">Kategori : </span>
                                            {{ $product->categories->category }}
                                        </h6>
                                        <p>{!! $product->description !!}</p>
                                        <div class="row">
                                            <div class="col-8">
                                                <h3>
                                                    Rp. {{ $product->price }}
                                                    <small class="text-muted">/ Pcs</small>
                                                </h3>
                                            </div>
                                            <div class="col-4">
                                                @if ($product->stock == 0)
                                                    <button type="button"
                                                        class="btn btn-danger btn-icon icon-left d-inline btn-block">
                                                        <i class="fa-solid fa-boxes-stacked"></i> Stok <span
                                                            class="badge badge-transparent">{{ $product->stock }}</span>
                                                    </button>
                                                @elseif ($product->stock <= 15)
                                                    <button type="button"
                                                        class="btn btn-warning btn-icon icon-left d-inline btn-block">
                                                        <i class="fa-solid fa-boxes-stacked"></i> Stok <span
                                                            class="badge badge-transparent">{{ $product->stock }}</span>
                                                    </button>
                                                @else
                                                    <button type="button"
                                                        class="btn btn-success btn-icon icon-left d-inline btn-block">
                                                        <i class="fa-solid fa-boxes-stacked"></i> Stok <span
                                                            class="badge badge-transparent">{{ $product->stock }}</span>
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
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
    <!-- JS Libraies -->
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.css') }}"></script>

    <!-- Page Specific JS File -->
@endpush
