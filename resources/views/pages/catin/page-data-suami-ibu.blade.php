{{-- DATA AYAH SUAMI --}}
<div class="tab-pane fade" id="mother_husband" role="tabpanel" aria-labelledby="mother_husband-tab">
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="name_mother_husband">Nama <span class="text-danger">*</span></label>
            <input type="text" name="name_mother_husband"
                class="form-control @error('name_mother_husband') is-invalid @enderror"
                @if ($married->status > 2) disabled @endif
                value="{{ $married->name_mother_husband != null ? $married->name_mother_husband : old('name_mother_husband') }}">
            @error('name_mother_husband')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-4">
            <label for="is_unknown_mother_husband">Ceklis <span class="text-danger">*</span></label>
            <div class="form-check">
                <input class="form-check-input @error('is_unknown_mother_husband') is-invalid @enderror" type="checkbox"
                    value="true" id="is_unknown_mother_husband" name="is_unknown_mother_husband"
                    @checked(old('is_unknown_mother_husband', $married->is_unknown_mother_husband))>
                <label class="form-check-label" for="is_unknown_mother_husband">
                    Jika Meninggal/Tidak Diketahui
                </label>
                @error('is_unknown_mother_husband')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="citizen_mother_husband">Warga Negara <span class="text-danger">*</span></label>
            <select class="form-control @error('citizen_mother_husband') is-invalid @enderror"
                id="citizen_mother_husband" @if ($married->status > 2) disabled @endif
                name="citizen_mother_husband">
                <option value="">Pilih Warga Negara</option>
                <option value="WNI"
                    {{ $married->citizen_mother_husband == 'WNI' || old('citizen_mother_husband') == 'WNI' ? 'selected' : '' }}>
                    WNI</option>
                <option value="WNA"
                    {{ $married->citizen_mother_husband == 'WNA' || old('citizen_mother_husband') == 'WNA' ? 'selected' : '' }}>
                    WNA
                </option>
            </select>
            @error('citizen_mother_husband')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-3">
            <label for="nik_mother_husband">NIK <span class="text-danger">*</span></label>
            <input type="text" name="nik_mother_husband" id="nik_mother_husband"
                class="form-control @error('nik_mother_husband') is-invalid @enderror"
                @if ($married->status > 2) disabled @endif
                value="{{ $married->nik_mother_husband != null ? $married->nik_mother_husband : old('nik_mother_husband') }}">
            @error('nik_mother_husband')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-3">
            <label>Negara Asal <span class="text-danger">*</span></label>
            <input type="text" name="nationality_mother_husband" id="nationality_mother_husband"
                class="form-control @error('nationality_mother_husband') is-invalid @enderror"
                @if ($married->status > 2) disabled @endif
                value="{{ $married->nationality_mother_husband != null ? $married->nationality_mother_husband : old('nationality_mother_husband') }}"
                placeholder="INDONESIA">
            @error('nationality_mother_husband')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-3">
            <label for="no_passport_mother_husband">No. Passport <span class="text-danger">*</span></label>
            <input type="text" name="no_passport_mother_husband" id="no_passport_mother_husband"
                class="form-control @error('no_passport_mother_husband') is-invalid @enderror"
                @if ($married->status > 2) disabled @endif
                value="{{ $married->no_passport_mother_husband != null ? $married->no_passport_mother_husband : old('no_passport_mother_husband') }}">
            @error('no_passport_mother_husband')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Tempat Lahir <span class="text-danger">*</span></label>
            <input type="text" name="location_birth_mother_husband" id="location_birth_mother_husband"
                class="form-control @error('location_birth_mother_husband') is-invalid @enderror"
                @if ($married->status > 2) disabled @endif
                value="{{ $married->location_birth_mother_husband != null ? $married->location_birth_mother_husband : old('location_birth_mother_husband') }}">
            @error('location_birth_mother_husband')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="date_birth_mother_husband">Tanggal Lahir <span class="text-danger">*</span></label>
            <input type="date" class="form-control" @if ($married->status > 2) disabled @endif
                id="date_birth_mother_husband" name="date_birth_mother_husband"
                value="{{ old('date_birth_mother_husband', optional($married->date_birth_mother_husband)->format('Y-m-d')) }}">
            {{-- value="{{ $married->date_birth_mother_husband != null ? $married->date_birth_mother_husband->format('Y-m-d') : Carbon\Carbon::parse(old('date_birth_mother_husband'))->format('Y-m-d') }}"> --}}
            @error('date_birth_mother_husband')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="religion_mother_husband">Agama <span class="text-danger">*</span></label>
            <x-religion name="religion_mother_husband" :selected="$married->religion_mother_husband != null
                ? $married->religion_mother_husband
                : old('religion_mother_husband')" :status="$married->status" />
        </div>
        <div class="form-group col-md-6">
            <label for="job_mother_husband">Pekerjaan <span class="text-danger">*</span></label>
            <x-job name="job_mother_husband" :selected="$married->job_mother_husband != null ? $married->job_mother_husband : old('job_mother_husband')" :status="$married->status" />
        </div>
    </div>
    <div class="form-row">
        <label>Alamat <span class="text-danger">*</span></label>
        <input type="text" name="address_mother_husband" id="address_mother_husband"
            class="form-control @error('address_mother_husband') is-invalid @enderror"
            @if ($married->status > 2) disabled @endif
            value="{{ $married->address_mother_husband != null ? $married->address_mother_husband : old('address_mother_husband') }}">
        @error('address_mother_husband')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
{{-- END  DATA AYAH SUAMI --}}
