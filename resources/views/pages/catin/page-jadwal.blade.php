<div class="row">
    <div class="col">
        <div class="form-group">
            <label>Tanggal Daftar</label>
            <input type="text" class="form-control" @if ($married->status > 2) disabled @endif readonly
                value="{{ now()->format('Y-m-d') }}">
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Provinsi</label>
                <input type="text" class="form-control" value="RIAU" disabled>
            </div>
            <div class="form-group col-md-4">
                <label>Kabupaten/Kota</label>
                <input type="text" class="form-control" value="SINGINGI" disabled>
            </div>
            <div class="form-group col-md-4">
                <label>Kecamatan</label>
                <input type="text" class="form-control" value="PANGEAN" disabled>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="married_on">Nikah Di <span class="text-danger">*</span></label>
                <select class="form-control @error('married_on') is-invalid @enderror"
                    @if ($married->status > 2) disabled @endif name="married_on">
                    <option value="DI LUAR KUA">DI LUAR KUA</option>
                    <option value="DI KUA">DI KUA</option>
                </select>
                @error('married_on')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="kua">KUA <span class="text-danger">*</span></label>
                <select class="form-control @error('kua') is-invalid @enderror"
                    @if ($married->status > 2) disabled @endif name="kua">
                    <option value="KUA PANGEAN">KUA PANGEAN</option>
                </select>
                @error('kua')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="desa_location">Desa/Kelurahan/Wali Nagari <span class="text-danger">*</span></label>
                @php
                    $desaData = [
                        'PASAR BARU PANGEAN',
                        'KOTO PANGEAN',
                        'PULAU KUMPAI',
                        'PULAU TONGAH',
                        'PULAU DERAS',
                        'TELUK PAUH',
                        'TANAH BEKALI',
                        'PADANG TANGGUNG',
                        'PADANG KUNIK',
                        'PEMBATANG',
                        'PAUH ANGIT',
                        'SUKAPING',
                        'PULAU RENGAS',
                        'RAWANG BINJAI',
                        'SAKO',
                        'SUNGAI LANGSAT',
                        'PAUH ANGIT HULU',
                    ];
                @endphp
                <select class="form-control @error('desa_location') is-invalid @enderror"
                    @if ($married->status > 2) disabled @endif name="desa_location">
                    <option value="">PILIH DESA/KELURAHAN/WALI NAGARI</option>
                    @foreach ($desaData as $desa)
                        <option value="{{ $desa }}"
                            {{ old('desa_location') == $desa || $married->desa_location == $desa ? 'selected' : '' }}>
                            {{ $desa }}
                        </option>
                    @endforeach
                </select>
                @error('desa_location')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="akad_date_masehi">Tanggal Akad <span class="text-danger">*</span></label>
                <div class="row">
                    <div class="col">
                        <input type="date" name="akad_date_masehi"
                            class="form-control @error('akad_date_masehi') is-invalid @enderror"
                            @if ($married->status > 2) disabled @endif
                            value="{{ old('akad_date_masehi', optional($married->akad_date_masehi)->format('Y-m-d')) }}">
                        {{-- value="{{ $married->akad_date_masehi != null ? $married->akad_date_masehi->format('Y-m-d') : Carbon\Carbon::parse(old('akad_date_masehi'))->format('Y-m-d') }}"> --}}
                        @error('akad_date_masehi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <input type="time" name="akad_time_masehi"
                            class="form-control @error('akad_time_masehi') is-invalid @enderror"
                            @if ($married->status > 2) disabled @endif
                            value="{{ old('akad_time_masehi', optional($married->akad_date_masehi)->format('H:i')) }}">
                        {{-- value="{{ $married->akad_date_masehi != null ? $married->akad_date_masehi->format('H:i') : old('akad_time_masehi') }}"> --}}
                        @error('akad_time_masehi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <span class="text-muted">Catatan: Apa bila nikah di KUA, pilih tanggal di hari Senin-Jumat dan bukan
                    hari libur</span>
            </div>
        </div>

        <div class="form-group mb-0">
            <label>Alamat Lokasi Akad Nikah <span class="text-danger">*</span></label>
            <input type="text" name="akad_location" class="form-control @error('akad_location') is-invalid @enderror"
                @if ($married->status > 2) disabled @endif
                value="{{ $married->akad_location != null ? $married->akad_location : old('akad_location') }}">
            @error('akad_location')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
