<div class="row">
    <div class="col">
        <div class="form-group">
            <label>Tanggal Daftar</label>
            <input type="text" class="form-control" @if ($married->status > 2) disabled @endif readonly
                value="{{ now()->format('Y-m-d') }}">
        </div>
        Rencana Pelaksanaan Akad Nikah
        <div class="form-group">
            <label>Nikah Di</label>
            <input type="text" name="location_name"
                value="{{ $married->location_name != null ? $married->location_name : old('location_name') }}"
                class="form-control" @if ($married->status > 2) disabled @endif>
        </div>
        <div class="form-group">
            <label>Tanggal Akad</label>
            <div class="form-group row">
                <div class="col-sm-5">
                    <input type="date" name="akad_date_masehi" class="form-control"
                        @if ($married->status > 2) disabled @endif
                        value="{{ $married->akad_date_masehi != null ? $married->akad_date_masehi->format('Y-m-d') : Carbon\Carbon::parse(old('akad_date_masehi'))->format('Y-m-d') }}">
                </div>
                <div class="col-sm-2">
                    Tahun Masehi
                </div>
                <div class="col-sm-5">
                    <input type="time" name="akad_time_masehi" class="form-control"
                        @if ($married->status > 2) disabled @endif
                        value="{{ $married->akad_date_masehi != null ? $married->akad_date_masehi->format('H:i') : old('akad_time_masehi') }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-5">
                    <input type="date" name="akad_date_hijriah" class="form-control"
                        @if ($married->status > 2) disabled @endif
                        value="{{ $married->akad_date_hijriah != null ? $married->akad_date_hijriah->format('Y-m-d') : Carbon\Carbon::parse(old('akad_date_hijriah'))->format('Y-m-d') }}">
                </div>
                <div class="col-sm-2">
                    Tahun Hijriah
                </div>
                <div class="col-sm-5">
                    <input type="time" name="akad_time_hijriah" class="form-control"
                        @if ($married->status > 2) disabled @endif
                        value="{{ $married->akad_date_hijriah != null ? $married->akad_date_hijriah->format('H:i') : old('akad_time_hijriah') }}">
                </div>
            </div>
        </div>
        <div class="form-group mb-0">
            <label>Alamat Lokasi Akad Nikah</label>
            <input type="text" name="akad_location" class="form-control"
                @if ($married->status > 2) disabled @endif
                value="{{ $married->akad_location != null ? $married->akad_location : old('akad_location') }}">
        </div>
    </div>
</div>
