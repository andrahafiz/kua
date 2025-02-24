@extends('layouts.app-staff')

@section('title', 'Detail Data Pernikahan')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/chocolat/dist/css/chocolat.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">

    <style>
        .text-default {
            color: #34395e;
        }

        .w-65 {
            width: 65%;
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
                <h1>Detail Data Pernikahan
                    <br><span
                        class="text-muted">{{ $married->husbands->name_husband . ' & ' . $married->wives->name_wife }}</span>
                </h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('staff.married.index') }}">Pernikahan</a></div>
                    <div class="breadcrumb-item">Detail Data Pernikahan</div>
                </div>
            </div>

            <div class="section-body">
                {{-- <h2 class="section-title">Detail Data Pernikahan</h2>
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
                <div class="row">
                    <div class="col-lg-4 col-sm-12  ">
                        <div class="card card-warning">
                            <div class="card-header">
                                @if ($married->status == 4)
                                    <h4>Data Penghulu Dan Pranikah</h4>
                                @else
                                    <h4>Aksi</h4>
                                @endif
                                <div class="card-header-action">
                                    <a data-collapse="#mycard-collapse" class="btn btn-icon btn-warning" href="#"><i
                                            class="fas fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="collapse show" id="mycard-collapse">
                                <div class="card-body">
                                    @if ($married->married_payment()->exists() == true && $married->status == 1 && $married->status_payment == 1)
                                        @include('pages.staff.married.action.verification-payment')
                                    @elseif(($married->status == 3 || $married->status == 0) && $married->status_payment == 2)
                                        @include('pages.staff.married.action.assign-penghulu')
                                    @elseif($married->status == 4)
                                        <table>
                                            <tr>
                                                <th class="p-3">Nama Penghulu</th>
                                                <td>{{ $married->penghulu->name_penghulu }}</td>
                                            </tr>
                                            <tr>
                                                <th class="p-3">Tanggal Pra Nikah</th>
                                                <td>{{ $married->pramarried_date->isoFormat('dddd, D MMMM Y HH:mm') }}</td>
                                            </tr>
                                            @if ($married->akta_nikah_number != null)
                                                <tr>
                                                    <th class="p-3">Nomor Akad Nikah</th>
                                                    <td>{{ $married->akta_nikah_number }}</td>
                                                </tr>
                                            @endif
                                        </table>
                                        <div class="mt-3">
                                            <form method="POST" enctype="multipart/form-data"
                                                action="{{ route('staff.generate_number', $married->id) }}">
                                                @csrf
                                                @method('PUT')
                                                @if ($married->akta_nikah_number == null && $married->document_akta_nikah == null)
                                                    <label>Dokumen Akta Nikah</label>
                                                    <input class="form-control mb-3" type="file" required
                                                        name="document_akta_nikah" />
                                                    <button type="submit"
                                                        class="btn btn-icon btn-block icon-left btn-success"><i
                                                            class="fas fa-gears"></i> Generate Nomor Akad Nikah
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                    @endif
                                    {{-- @if ($married->status == 1 && $married->status_payment == 1)
                                        <div class="alert alert-primary">
                                            <div class="alert-title">Pemberitahuan</div>
                                            Pembayaran anda sedang dalam proses verifikasi.
                                        </div>
                                    @else
                                        <a href="{{ Helper::setUrlImage($paymentmarried?->proof_payment) }}"
                                            class="chocolat-image">
                                            <div>
                                                <img alt="image"
                                                    src="{{ Helper::setUrlImage($paymentmarried?->proof_payment) }}"
                                                    class="img-fluid img-thumbnail w-50">
                                            </div>
                                        </a>
                                    @endif --}}
                                    {{-- @endif --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-sm-12 @if ($married->status == 4) order-first @endif">
                        <div class="card card-warning">
                            <div class="card-body">
                                <div class="section-title mt-0">Data Pernikahan</div>
                                <table class="w-50">
                                    <tr>
                                        <th class="p-3 w-50">Status Dokumen</th>
                                        <td><x-status-pernikahan status="{{ $married->status }}" /></td>
                                    </tr>
                                    <tr>
                                        <th class="p-3 w-50">Status Pembayaran</th>
                                        <td><x-status-pembayaran status="{{ $married->status_payment }}" /></td>
                                    </tr>
                                    <tr>
                                        <th class="p-3 w-50">Register Number</th>
                                        <td>{{ $married->registration_number }}</td>
                                    </tr>
                                    <tr>
                                        <th class="p-3 w-50">Lokasi Nikah</th>
                                        <td>{{ $married->akad_location }}</td>
                                    </tr>
                                    <tr>
                                        <th class="p-3 w-50">Lokasi Akad</th>
                                        <td>{{ $married->married_on }}</td>
                                    </tr>
                                    <tr>
                                        <th class="p-3 w-50">KUA</th>
                                        <td>{{ $married->kua ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="p-3 w-50">Desa</th>
                                        <td>{{ $married->desa_location ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="p-3 w-50">Tanggal Akad (Masehi)</th>
                                        <td>{{ $married->akad_date_masehi->isoFormat('dddd, D MMMM Y HH:mm') }}</td>
                                    </tr>
                                    <tr>
                                        <th class="p-3 w-50">Mahar Pernikahan</th>
                                        <td>{{ $married->mahar }}</td>
                                    </tr>
                                </table>
                                <div class="section-title">Data Calon Mempelai</div>
                                <table class="w-100">
                                    <thead>
                                        <tr>
                                            <th class="p-3 w-25"></th>
                                            <th class="p-3">Data Suami</th>
                                            <th class="p-3">Data Istri</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="p-3 w-25">NIK</th>
                                            <td>{{ $married->husbands->nik_husband }}</td>
                                            <td>{{ $married->wives->nik_wife }}</td>
                                        </tr>
                                        <tr>
                                            <th class="p-3 w-25">Nama</th>
                                            <td>{{ $married->husbands->name_husband }}</td>
                                            <td>{{ $married->wives->name_wife }}</td>
                                        </tr>
                                        <tr>
                                            <th class="p-3 w-25">Tempat Lahir</th>
                                            <td>{{ $married->husbands->location_birth_husband }}</td>
                                            <td>{{ $married->wives->location_birth_wife }}</td>
                                        </tr>
                                        <tr>
                                            <th class="p-3 w-25">Tangal Lahir</th>
                                            <td>{{ $married->husbands->date_birth_husband?->isoFormat('dddd, D MMMM Y') }}
                                            </td>
                                            <td>{{ $married->wives->date_birth_wife?->isoFormat('dddd, D MMMM Y') }}</td>
                                        </tr>
                                        <tr>
                                            <th class="p-3 w-25">Umur</th>
                                            <td>{{ $married->husbands->old_husband }}</td>
                                            <td>{{ $married->wives->old_wife }}</td>
                                        </tr>
                                        <tr>
                                            <th class="p-3 w-25">Agama</th>
                                            <td>{{ $married->husbands->religion_husband }}</td>
                                            <td>{{ $married->wives->religion_wife }}</td>
                                        </tr>
                                        <tr>
                                            <th class="p-3 w-25">Status</th>
                                            <td>{{ $married->husbands->status_husband }}</td>
                                            <td>{{ $married->wives->status_wife }}</td>
                                        </tr>
                                        <tr>
                                            <th class="p-3 w-25">Kewarganegaraan</th>
                                            <td>{{ $married->husbands->nationality_husband }}</td>
                                            <td>{{ $married->wives->nationality_wife }}</td>
                                        </tr>
                                        <tr>
                                            <th class="p-3 w-25">Alamat</th>
                                            <td>{{ $married->husbands->address_husband }}</td>
                                            <td>{{ $married->wives->address_wife }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="section-title">Dokumen</div>
                                <table class="w-100">
                                    <thead>
                                        <tr>
                                            <th class="p-3 w-25"></th>
                                            <th class="p-3">Data Suami</th>
                                            <th class="p-3">Data Istri</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="p-3 w-25">Photo</th>
                                            <td>
                                                @if ($married->married_documents?->photo_husband != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->photo_husband) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                            <td>
                                                @if ($married->married_documents?->photo_wife != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->photo_wife) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="p-3 w-25">Kartu Tanda Penduduk</th>
                                            <td>
                                                @if ($married->married_documents?->ktp_husband != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->ktp_husband) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                            <td>
                                                @if ($married->married_documents?->ktp_wife != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->ktp_wife) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="p-3 w-25">Kartu Keluarga</th>
                                            <td>
                                                @if ($married->married_documents?->kk_husband != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->kk_husband) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                            <td>
                                                @if ($married->married_documents?->kk_wife != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->kk_wife) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="p-3 w-25">Akta Lahir</th>
                                            <td>
                                                @if ($married->married_documents?->akta_husband != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->akta_husband) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                            <td>
                                                @if ($married->married_documents?->akta_wife != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->akta_wife) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="p-3 w-25">Ijazah</th>
                                            <td>
                                                @if ($married->married_documents?->ijazah_husband != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->ijazah_husband) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                            <td>
                                                @if ($married->married_documents?->ijazah_wife != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->ijazah_wife) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="p-3 w-25">Surat Keterangan Wali Nikah</th>
                                            <td>
                                                @if ($married->married_documents?->surat_keterangan_wali_nikah_husband != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->surat_keterangan_wali_nikah_husband) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                            <td>
                                                @if ($married->married_documents?->surat_keterangan_wali_nikah_wife != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->surat_keterangan_wali_nikah_wife) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="p-3 w-25">N1</th>
                                            <td>
                                                @if ($married->married_documents?->N1_husband != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->N1_husband) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                            <td>
                                                @if ($married->married_documents?->N1_wife != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->N1_wife) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="p-3 w-25">N2</th>
                                            <td>
                                                @if ($married->married_documents?->N2_husband != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->N2_husband) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                            <td>
                                                @if ($married->married_documents?->N2_wife != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->N2_wife) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="p-3 w-25">N4</th>
                                            <td>
                                                @if ($married->married_documents?->N4_husband != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->N4_husband) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                            <td>
                                                @if ($married->married_documents?->N4_wife != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->N4_wife) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="p-3 w-25">N5</th>
                                            <td>
                                                @if ($married->married_documents?->N5_husband != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->N5_husband) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                            <td>
                                                @if ($married->married_documents?->N5_wife != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->N5_wife) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="p-3 w-25">Surat Dispensasi</th>
                                            <td>
                                                @if ($married->married_documents?->surat_dispensasi_husband != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->surat_dispensasi_husband) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                            <td>
                                                @if ($married->married_documents?->surat_dispensasi_wife != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->surat_dispensasi_wife) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="p-3 w-25">Akta Cerai</th>
                                            <td>
                                                @if ($married->married_documents?->akta_cerai_husband != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->akta_cerai_husband) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                            <td>
                                                @if ($married->married_documents?->akta_cerai_wife != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->akta_cerai_wife) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="p-3 w-25">Akta Kematian</th>
                                            <td>
                                                @if ($married->married_documents?->akta_kematian_husband != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->akta_kematian_husband) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                            <td>
                                                @if ($married->married_documents?->akta_kematian_wife != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->akta_kematian_wife) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="p-3 w-25">Surat Izin Komandan</th>
                                            <td>
                                                @if ($married->married_documents?->N5_husband != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->N5_husband) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                            <td>
                                                @if ($married->married_documents?->N5_wife != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->N5_wife) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="p-3 w-25">Rekomendasi KUA</th>
                                            <td>
                                                @if ($married->married_documents?->rekomendasi_kua_husband != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->rekomendasi_kua_husband) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                            <td>
                                                @if ($married->married_documents?->rekomendasi_kua_wife != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->rekomendasi_kua_wife) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="p-3 w-25">Surat Kedutaan</th>
                                            <td>
                                                @if ($married->married_documents?->surat_kedutaan_husband != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->surat_kedutaan_husband) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                            <td>
                                                @if ($married->married_documents?->surat_kedutaan_wife != null)
                                                    <a href="{{ Helper::setUrlDocument($married->married_documents?->surat_kedutaan_wife) }}"
                                                        target="blank">Lihat
                                                        Dokumen</a>
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

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
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
@endpush
