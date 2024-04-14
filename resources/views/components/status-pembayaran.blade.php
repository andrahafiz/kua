@switch($status)
    @case(0)
        <span class="badge badge-light">Belum Pembayaran</span>
    @break

    @case(1)
        <span class="badge badge-primary">Verifikasi Pembayaran</span>
    @break

    @case(2)
        <span class="badge badge-success">Diterima</span>
    @break

    @case(3)
        <span class="badge badge-danger">Ditolak</span>
    @break

    @default
        <span class="badge badge-light">Error</span>
@endswitch
