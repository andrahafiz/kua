@if ($paymentmarried == null || ($married->status == 2 && $married->status_payment == 3))
    @if ($married->status == 2 && $married->status_payment == 3)
        <div class="row">
            <div class="col">
                <div class="alert alert-danger alert-has-icon">
                    <div class="alert-icon"><i class="far fa-lightbulb"></i>
                    </div>
                    <div class="alert-body">
                        <div class="alert-title"> Verifikasi Pembayaran Anda Ditolak</div>
                        Alasan : {{ $married->reason_approval }}<br />
                        Mohon untuk melakukan transfer ulang atau mengupload ulang bukti
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col">
                <div class="alert alert-warning alert-has-icon">
                    <div class="alert-icon"><i class="far fa-lightbulb"></i>
                    </div>
                    <div class="alert-body">
                        <div class="alert-title">Info</div>
                        Mohon diperhatikan!!! Apa bila bukti upload pembayaran
                        telah
                        diajukan, <strong>maka kami menganggap data anda telah
                            diisi
                            dengan BENAR</strong>. Maka dari
                        itu mohon sebelum mengajukan bukti pembayaran periksa
                        kembali
                        data yang anda isi. Terima Kasih.
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col">
            <div class="empty-state pb-0">

                <div class="empty-state-icon">
                    <i class="fas fa-credit-card"></i>
                </div>
                <h2>Pembayaran</h2>

                <div class="lead">
                    <div class="form-group row">
                        <div class="images">
                            <img src="{{ asset('img/payment/norekening.jpeg') }}" width="50%" alt="norekening">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="alert alert-primary">
                            <h2 class="p-0 m-0">NOMINAL YANG ANDA HARUS BAYARKAN ADALAH Rp. 600.000</h2>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="code_billing" class="col-sm-4 col-form-label">Upload Bukti
                            Pembayaran</label>
                        <div class="col-sm-8">
                            <input type="file" name="proof_payment" class="form-control"
                                @if ($married->status > 2) disabled @endif>
                        </div>
                    </div>
                    <hr />
                    <button type="submit" name="action" class="btn btn-primary btn-lg btn-block"
                        value="daftar">Daftar</button>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="row">
        <div class="col">
            <div class="empty-state pb-0">
                <h2>Bukti Pembayaran</h2>
                <div class="images">
                    @if ($paymentmarried?->proof_payment != null)
                        @if ($married->status == 1 && $married->status_payment == 1)
                            <div class="alert alert-primary">
                                <div class="alert-title">Pemberitahuan</div>
                                Pembayaran anda sedang dalam proses verifikasi.
                            </div>
                            <a href="{{ Helper::setUrlImage($paymentmarried?->proof_payment) }}" class="chocolat-image">
                                <div>
                                    <img alt="image" src="{{ Helper::setUrlImage($paymentmarried?->proof_payment) }}"
                                        class="img-fluid img-thumbnail w-50">
                                </div>
                            </a>
                        @else
                            <a href="{{ Helper::setUrlImage($paymentmarried?->proof_payment) }}" class="chocolat-image">
                                <div>
                                    <img alt="image" src="{{ Helper::setUrlImage($paymentmarried?->proof_payment) }}"
                                        class="img-fluid img-thumbnail w-50">
                                </div>
                            </a>
                        @endif
                    @endif

                </div>

                {{-- <div class="lead">
                                                                <div class="form-group row">

                                                                </div>
                                                                <div class="form-group row">


                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="code_billing"
                                                                        class="col-sm-4 col-form-label">Upload Bukti
                                                                        Pembayaran</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="file" name="proof_payment"
                                                                            class="form-control"
                                                                            @if ($married->status > 2) disabled @endif>
                                                                    </div>
                                                                </div>
                                                            </div> --}}
            </div>
        </div>
    </div>
@endif
