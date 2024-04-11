@switch($status)
    @case(0)
        <span class="badge badge-light">Mengisi Data</span>
    @break

    @case(1)
        <span class="badge badge-primary">Menunggu Pembayaran</span>
    @break

    @case(2)
        <span class="badge badge-danger">Perbaikan Berkas</span>
    @break

    @case(3)
        <span class="badge badge-info">Penetapan Penghulu</span>
    @break

    @case(4)
        <span class="badge badge-success">Selesai</span>
    @break

    @case(5)
        <span class="badge badge-warning">Warning</span>
    @break

    @case(6)
        <span class="badge badge-info">Info</span>
    @break

    @case(7)
        <span class="badge badge-light">Light</span>
    @break

    @case(8)
        <span class="badge badge-dark">Dark</span>
    @break

    @default
        <span class="badge badge-light">Light</span>
@endswitch
