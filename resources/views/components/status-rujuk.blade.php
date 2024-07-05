@switch($status)
    @case(1)
        <span class="badge badge-warning">Diajukan</span>
    @break

    @case(2)
        <span class="badge badge-success">Diterima</span>
    @break

    @case(3)
        <span class="badge badge-danger">Ditolak</span>
    @break

    @default
        <span class="badge badge-light">Tidak Ada Status</span>
@endswitch
