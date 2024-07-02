{{-- DATA AYAH SUAMI --}}
<div class="tab-pane fade" id="father_wife" role="tabpanel" aria-labelledby="father_wife-tab">
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="name_father_wife">Nama <span class="text-danger">*</span></label>
            <input type="text" name="name_father_wife"
                class="form-control @error('name_father_wife') is-invalid @enderror"
                @if ($married->status > 2) disabled @endif
                value="{{ $married->name_father_wife != null ? $married->name_father_wife : old('name_father_wife') }}">
            @error('name_father_wife')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-4">
            <label for="is_unknown_father_wife">Ceklis <span class="text-danger">*</span></label>
            <div class="form-check">
                <input class="form-check-input @error('is_unknown_father_wife') is-invalid @enderror" type="checkbox"
                    value="true" id="is_unknown_father_wife" name="is_unknown_father_wife"
                    @checked(old('is_unknown_father_wife', $married->is_unknown_father_wife))>
                <label class="form-check-label" for="is_unknown_father_wife">
                    Jika Meninggal/Tidak Diketahui
                </label>
                @error('is_unknown_father_wife')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="citizen_father_wife">Warga Negara <span class="text-danger">*</span></label>
            <select class="form-control @error('citizen_father_wife') is-invalid @enderror" id="citizen_father_wife"
                @if ($married->status > 2) disabled @endif name="citizen_father_wife">
                <option value="">Pilih Warga Negara</option>
                <option value="WNI"
                    {{ $married->citizen_father_wife == 'WNI' || old('citizen_father_wife') == 'WNI' ? 'selected' : '' }}>
                    WNI</option>
                <option value="WNA"
                    {{ $married->citizen_father_wife == 'WNA' || old('citizen_father_wife') == 'WNA' ? 'selected' : '' }}>
                    WNA
                </option>
            </select>
            @error('citizen_father_wife')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-3">
            <label for="nik_father_wife">NIK <span class="text-danger">*</span></label>
            <input type="text" name="nik_father_wife" id="nik_father_wife"
                class="form-control @error('nik_father_wife') is-invalid @enderror"
                @if ($married->status > 2) disabled @endif
                value="{{ $married->nik_father_wife != null ? $married->nik_father_wife : old('nik_father_wife') }}">
            @error('nik_father_wife')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-3">
            <label>Negara Asal <span class="text-danger">*</span></label>
            <input type="text" name="nationality_father_wife" id="nationality_father_wife"
                class="form-control @error('nationality_father_wife') is-invalid @enderror"
                @if ($married->status > 2) disabled @endif
                value="{{ $married->nationality_father_wife != null ? $married->nationality_father_wife : old('nationality_father_wife') }}"
                placeholder="INDONESIA">
            @error('nationality_father_wife')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-3">
            <label for="no_passport_father_wife">No. Passport <span class="text-danger">*</span></label>
            <input type="text" name="no_passport_father_wife" id="no_passport_father_wife"
                class="form-control @error('no_passport_father_wife') is-invalid @enderror"
                @if ($married->status > 2) disabled @endif
                value="{{ $married->no_passport_father_wife != null ? $married->no_passport_father_wife : old('no_passport_father_wife') }}">
            @error('no_passport_father_wife')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Tempat Lahir <span class="text-danger">*</span></label>
            <input type="text" name="location_birth_father_wife" id="location_birth_father_wife"
                class="form-control @error('location_birth_father_wife') is-invalid @enderror"
                @if ($married->status > 2) disabled @endif
                value="{{ $married->location_birth_father_wife != null ? $married->location_birth_father_wife : old('location_birth_father_wife') }}">
            @error('location_birth_father_wife')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="date_birth_father_wife">Tanggal Lahir <span class="text-danger">*</span></label>
            <input type="date" class="form-control" @if ($married->status > 2) disabled @endif
                id="date_birth_father_wife" name="date_birth_father_wife"
                value="{{ $married->date_birth_father_wife != null ? $married->date_birth_father_wife->format('Y-m-d') : Carbon\Carbon::parse(old('date_birth_father_wife'))->format('Y-m-d') }}">
            @error('date_birth_father_wife')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="religion_father_wife">Agama <span class="text-danger">*</span></label>
            <x-religion name="religion_father_wife" :selected="$married->religion_father_wife != null
                ? $married->religion_father_wife
                : old('religion_father_wife')" :status="$married->status" />
        </div>
        <div class="form-group col-md-6">
            <label for="job_father_wife">Pekerjaan <span class="text-danger">*</span></label>
            <x-job name="job_father_wife" :selected="$married->job_father_wife != null ? $married->job_father_wife : old('job_father_wife')" :status="$married->status" />
        </div>
    </div>
    <div class="form-row">
        <label>Alamat <span class="text-danger">*</span></label>
        <input type="text" name="address_father_wife" id="address_father_wife"
            class="form-control @error('address_father_wife') is-invalid @enderror"
            @if ($married->status > 2) disabled @endif
            value="{{ $married->address_father_wife != null ? $married->address_father_wife : old('address_father_wife') }}">
        @error('address_father_wife')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
{{-- END  DATA AYAH SUAMI --}}
