{{-- DATA AYAH SUAMI --}}
<div class="tab-pane fade" id="father_husband" role="tabpanel" aria-labelledby="father_husband-tab">
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="name_father_husband">Nama <span class="text-danger">*</span></label>
            <input type="text" name="name_father_husband"
                class="form-control @error('name_father_husband') is-invalid @enderror"
                @if ($married->status > 2) disabled @endif
                value="{{ $married->husbands->name_father_husband != null ? $married->husbands->name_father_husband : old('name_father_husband') }}">
            @error('name_father_husband')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-4">
            <label for="is_unknown_father_husband">Ceklis <span class="text-danger">*</span></label>
            <div class="form-check">
                <input class="form-check-input @error('is_unknown_father_husband') is-invalid @enderror" type="checkbox"
                    value="true" id="is_unknown_father_husband" name="is_unknown_father_husband"
                    @checked(old('is_unknown_father_husband', $married->husbands->is_unknown_father_husband))>
                <label class="form-check-label" for="is_unknown_father_husband">
                    Jika Meninggal/Tidak Diketahui
                </label>
                @error('is_unknown_father_husband')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="citizen_father_husband">Warga Negara <span class="text-danger">*</span></label>
            <select class="form-control @error('citizen_father_husband') is-invalid @enderror"
                id="citizen_father_husband" @if ($married->status > 2) disabled @endif
                name="citizen_father_husband">
                <option value="">Pilih Warga Negara</option>
                <option value="WNI"
                    {{ $married->husbands->citizen_father_husband == 'WNI' || old('citizen_father_husband') == 'WNI' ? 'selected' : '' }}>
                    WNI</option>
                <option value="WNA"
                    {{ $married->husbands->citizen_father_husband == 'WNA' || old('citizen_father_husband') == 'WNA' ? 'selected' : '' }}>
                    WNA
                </option>
            </select>
            @error('citizen_father_husband')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-3">
            <label for="nik_father_husband">NIK <span class="text-danger">*</span></label>
            <input type="text" name="nik_father_husband" id="nik_father_husband"
                class="form-control @error('nik_father_husband') is-invalid @enderror"
                @if ($married->status > 2) disabled @endif
                value="{{ $married->husbands->nik_father_husband != null ? $married->husbands->nik_father_husband : old('nik_father_husband') }}">
            @error('nik_father_husband')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-3">
            <label>Negara Asal <span class="text-danger">*</span></label>
            <input type="text" name="nationality_father_husband" id="nationality_father_husband"
                class="form-control @error('nationality_father_husband') is-invalid @enderror"
                @if ($married->status > 2) disabled @endif
                value="{{ $married->husbands->nationality_father_husband != null ? $married->husbands->nationality_father_husband : old('nationality_father_husband') }}"
                placeholder="INDONESIA">
            @error('nationality_father_husband')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-3">
            <label for="no_passport_father_husband">No. Passport <span class="text-danger">*</span></label>
            <input type="text" name="no_passport_father_husband" id="no_passport_father_husband"
                class="form-control @error('no_passport_father_husband') is-invalid @enderror"
                @if ($married->status > 2) disabled @endif
                value="{{ $married->husbands->no_passport_father_husband != null ? $married->husbands->no_passport_father_husband : old('no_passport_father_husband') }}">
            @error('no_passport_father_husband')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Tempat Lahir <span class="text-danger">*</span></label>
            <input type="text" name="location_birth_father_husband" id="location_birth_father_husband"
                class="form-control @error('location_birth_father_husband') is-invalid @enderror"
                @if ($married->status > 2) disabled @endif
                value="{{ $married->husbands->location_birth_father_husband != null ? $married->husbands->location_birth_father_husband : old('location_birth_father_husband') }}">
            @error('location_birth_father_husband')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="date_birth_father_husband">Tanggal Lahir <span class="text-danger">*</span></label>
            <input type="date" class="form-control" @if ($married->status > 2) disabled @endif
                id="date_birth_father_husband" name="date_birth_father_husband"
                value="{{ old('date_birth_father_husband', optional($married->husbands->date_birth_father_husband)->format('Y-m-d')) }}">
            {{-- value="{{ $married->husbands->date_birth_father_husband != null ? $married->husbands->date_birth_father_husband->format('Y-m-d') : Carbon\Carbon::parse(old('date_birth_father_husband'))->format('Y-m-d') }}"> --}}
            @error('date_birth_father_husband')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="religion_father_husband">Agama {{ $married->husbands->religion_father_husband }}<span
                    class="text-danger">*</span></label>
            <x-religion name="religion_father_husband" :selected="$married->husbands->religion_father_husband != null
                ? $married->husbands->religion_father_husband
                : old('religion_father_husband')" :status="$married->status" />
        </div>
        <div class="form-group col-md-6">
            <label for="job_father_husband">Pekerjaan <span class="text-danger">*</span></label>
            <x-job name="job_father_husband" :selected="$married->husbands->job_father_husband != null
                ? $married->husbands->job_father_husband
                : old('job_father_husband')" :status="$married->status" />
        </div>
    </div>
    <div class="form-row">
        <label>Alamat <span class="text-danger">*</span></label>
        <input type="text" name="address_father_husband" id="address_father_husband"
            class="form-control @error('address_father_husband') is-invalid @enderror"
            @if ($married->status > 2) disabled @endif
            value="{{ $married->husbands->address_father_husband != null ? $married->husbands->address_father_husband : old('address_father_husband') }}">
        @error('address_father_husband')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
{{-- END  DATA AYAH SUAMI --}}
