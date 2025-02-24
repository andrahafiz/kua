{{-- DATA AYAH ISTRI     --}}
<div class="tab-pane fade" id="mother_wife" role="tabpanel" aria-labelledby="mother_wife-tab">
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="name_mother_wife">Nama <span class="text-danger">*</span></label>
            <input type="text" name="name_mother_wife"
                class="form-control @error('name_mother_wife') is-invalid @enderror" @disabled($married->wives?->status > 2)
                value="{{ $married->wives?->name_mother_wife != null ? $married->wives?->name_mother_wife : old('name_mother_wife') }}">
            @error('name_mother_wife')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-4">
            <label for="is_unknown_mother_wife">Ceklis <span class="text-danger">*</span></label>
            <div class="form-check">
                <input class="form-check-input @error('is_unknown_mother_wife') is-invalid @enderror" type="checkbox"
                    value="1" id="is_unknown_mother_wife" name="is_unknown_mother_wife"
                    @checked(old('is_unknown_mother_wife', $married->wives?->is_unknown_mother_wife)) @disabled($married->wives?->status > 2)>
                <label class="form-check-label" for="is_unknown_mother_wife">
                    Jika Meninggal/Tidak Diketahui
                </label>
                @error('is_unknown_mother_wife')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="citizen_mother_wife">Warga Negara <span class="text-danger">*</span></label>
            <select class="form-control @error('citizen_mother_wife') is-invalid @enderror" id="citizen_mother_wife"
                @disabled($married->wives?->status > 2) name="citizen_mother_wife">
                <option value="">Pilih Warga Negara</option>
                <option value="WNI"
                    {{ $married->wives?->citizen_mother_wife == 'WNI' || old('citizen_mother_wife') == 'WNI' ? 'selected' : '' }}>
                    WNI</option>
                <option value="WNA"
                    {{ $married->wives?->citizen_mother_wife == 'WNA' || old('citizen_mother_wife') == 'WNA' ? 'selected' : '' }}>
                    WNA
                </option>
            </select>
            @error('citizen_mother_wife')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-3">
            <label for="nik_mother_wife">NIK <span class="text-danger">*</span></label>
            <input type="text" name="nik_mother_wife" id="nik_mother_wife"
                class="form-control @error('nik_mother_wife') is-invalid @enderror" @disabled($married->wives?->status > 2)
                value="{{ $married->wives?->nik_mother_wife != null ? $married->wives?->nik_mother_wife : old('nik_mother_wife') }}">
            @error('nik_mother_wife')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-3">
            <label>Negara Asal <span class="text-danger">*</span></label>
            <input type="text" name="nationality_mother_wife" id="nationality_mother_wife"
                class="form-control @error('nationality_mother_wife') is-invalid @enderror" @disabled($married->wives?->status > 2)
                value="{{ $married->wives?->nationality_mother_wife != null ? $married->wives?->nationality_mother_wife : old('nationality_mother_wife') }}"
                placeholder="INDONESIA">
            @error('nationality_mother_wife')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-3">
            <label for="no_passport_mother_wife">No. Passport <span class="text-danger">*</span></label>
            <input type="text" name="no_passport_mother_wife" id="no_passport_mother_wife"
                class="form-control @error('no_passport_mother_wife') is-invalid @enderror" @disabled($married->wives?->status > 2)
                value="{{ $married->wives?->no_passport_mother_wife != null ? $married->wives?->no_passport_mother_wife : old('no_passport_mother_wife') }}">
            @error('no_passport_mother_wife')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Tempat Lahir <span class="text-danger">*</span></label>
            <input type="text" name="location_birth_mother_wife" id="location_birth_mother_wife"
                class="form-control @error('location_birth_mother_wife') is-invalid @enderror"
                @disabled($married->wives?->status > 2)
                value="{{ $married->wives?->location_birth_mother_wife != null ? $married->wives?->location_birth_mother_wife : old('location_birth_mother_wife') }}">
            @error('location_birth_mother_wife')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="date_birth_mother_wife">Tanggal Lahir <span class="text-danger">*</span></label>
            <input type="date" class="form-control" @if ($married->wives?->status > 2) disabled @endif
                id="date_birth_mother_wife" name="date_birth_mother_wife"
                value="{{ old('date_birth_mother_wife', optional($married->wives?->date_birth_mother_wife)->format('Y-m-d')) }}">
            {{-- value="{{ $married->wives?->date_birth_mother_wife != null ? $married->wives?->date_birth_mother_wife->format('Y-m-d') : Carbon\Carbon::parse(old('date_birth_mother_wife'))->format('Y-m-d') }}"> --}}
            @error('date_birth_mother_wife')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="religion_mother_wife">Agama <span class="text-danger">*</span></label>
            <x-religion name="religion_mother_wife" :selected="$married->wives?->religion_mother_wife != null
                ? $married->wives?->religion_mother_wife
                : old('religion_mother_wife')" :status="$married->wives?->status" />
        </div>
        <div class="form-group col-md-6">
            <label for="job_mother_wife">Pekerjaan <span class="text-danger">*</span></label>
            <x-job name="job_mother_wife" :selected="$married->wives?->job_mother_wife != null ? $married->job_mother_wife : old('job_mother_wife')" :status="$married->status" />
        </div>
    </div>
    <div class="form-row">
        <label>Alamat <span class="text-danger">*</span></label>
        <input type="text" name="address_mother_wife" id="address_mother_wife"
            class="form-control @error('address_mother_wife') is-invalid @enderror" @disabled($married->wives?->status > 2)
            value="{{ $married->wives?->address_mother_wife != null ? $married->wives?->address_mother_wife : old('address_mother_wife') }}">
        @error('address_mother_wife')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
{{-- END  DATA AYAH ISTRI    --}}
