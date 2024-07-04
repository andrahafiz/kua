@switch($status)
    @case('Menikah')
        <span class="badge badge-success">Menikah</span>
    @break

    @case('Cerai')
        <span class="badge badge-danger">Cerai</span>
    @break

    @case('Rujuk')
        <span class="badge badge-warning">Rujuk</span>
    @break

    @default
        <span class="badge badge-light">Tidak Ada Status</span>
@endswitch
