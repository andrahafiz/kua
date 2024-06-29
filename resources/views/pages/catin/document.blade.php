@extends('layouts.app-catin')

@section('title', 'Dokumen')


@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dokumen</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">Dokumen</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Dokumen</h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table align-middle text-center" id="table-1">
                                        <thead class="thead-light">
                                            <tr>
                                                <th style="width: 10%">No</th>
                                                <th>Judul Document</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Model N1</td>
                                                <td><a target="blank" href="{{ asset('document/Model N1.pdf') }}"
                                                        class="btn btn-icon btn-sm btn-info"><i
                                                            class="fas fa-download"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Model N2</td>
                                                <td><a target="blank" href="{{ asset('document/Model N2.pdf') }}"
                                                        class="btn btn-icon btn-sm btn-info"><i
                                                            class="fas fa-download"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Model N4</td>
                                                <td><a target="blank" href="{{ asset('document/Model N4.pdf') }}"
                                                        class="btn btn-icon btn-sm btn-info"><i
                                                            class="fas fa-download"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Model N5</td>
                                                <td><a target="blank" href="{{ asset('document/Model N5.pdf') }}"
                                                        class="btn btn-icon btn-sm btn-info"><i
                                                            class="fas fa-download"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Model N6</td>
                                                <td><a target="blank" href="{{ asset('document/Model N6.pdf') }}"
                                                        class="btn btn-icon btn-sm btn-info"><i
                                                            class="fas fa-download"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Surat Keterangan Wali Nikah</td>
                                                <td><a target="blank"
                                                        href="{{ asset('document/SURAT KETERANGAN WALI NIKAH.pdf') }}"
                                                        class="btn btn-icon btn-sm btn-info"><i
                                                            class="fas fa-download"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
