@extends('layouts.app-catin')

@section('title', 'Beranda')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-hero">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="far fa-question-circle"></i>
                            </div>
                            <h4>Informasi</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="tickets-list">
                                <div class="ticket-item">
                                    <div class="ticket-title">
                                        <h4>Status Pernikahan</h4>
                                    </div>
                                    <div class="ticket-info">
                                        <x-status-married status="{{ $married->status_married }}" />
                                    </div>
                                </div>
                                <div class="ticket-item">
                                    <div class="ticket-title">
                                        <h4>Status Berkas</h4>
                                    </div>
                                    <div class="ticket-info">
                                        <x-status-pernikahan status="{{ $married->status }}" />
                                    </div>
                                </div>
                                <div class="ticket-item">
                                    <div class="ticket-title">
                                        <h4>Nomor Akta Nikah</h4>
                                    </div>
                                    <div class="ticket-info">
                                        <h4>
                                            {{ $married->akta_nikah_number ?? '-' }}
                                        </h4>
                                    </div>
                                </div>
                                <div class="ticket-item">
                                    <div class="ticket-title">
                                        <h4>Penghulu</h4>
                                    </div>
                                    <div class="ticket-info">
                                        <h4>
                                            {{ $married?->penghulu?->name_penghulu ?? 'Belum ditentukan' }}
                                        </h4>
                                    </div>
                                </div>
                                <div class="ticket-item">
                                    <div class="ticket-title">
                                        <h4>Tanggal Pranikah</h4>
                                    </div>
                                    <div class="ticket-info">
                                        <h4>{{ $married?->pramarried_date?->isoFormat('dddd, D MMMM Y') ?? 'Belum ditentukan' }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Notifikasi</h4>
                            <div class="card-header-action">
                                <a href="{{ route('catin.married.notification') }}" class="btn btn-danger">Selengkapnya <i
                                        class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive table-invoice">
                                <table class="table-striped table">
                                    <tr>
                                        <th style="width:30%">Tanggal</th>
                                        <th style="width:10%">Pesan</th>
                                        <th>Status</th>
                                        <th>Read ?</th>
                                    </tr>
                                    @foreach ($notifications as $notification)
                                        <tr
                                            {{ $notification->is_read != true ? 'style=background-color:rgba(163,229,255,0.319);' : '' }}>
                                            <td>
                                                {{ $notification->created_at?->isoFormat('dddd, D MMMM Y H:m') }}
                                            </td>
                                            <td>
                                                <div class="badge badge-{{ $notification->type }}">
                                                    {{ $notification->message }}
                                                </div>
                                            </td>
                                            <td class="font-weight-600"> {{ $notification->description }}</td>
                                            <td>
                                                @if ($notification->is_read == true)
                                                    <a class="btn btn-icon btn-sm btn-primary text-center disabled"><i
                                                            class="fas fa-envelope-open"></i></a>
                                                @else
                                                    <a href="{{ route('catin.married.notification.read', $notification->id) }}"
                                                        class="btn btn-icon btn-sm btn-primary text-center"><i
                                                            class="fas fa-envelope"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
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

    <!-- Page Specific JS File -->
@endpush
