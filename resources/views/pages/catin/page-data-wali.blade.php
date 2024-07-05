{{-- DATA AYAH SUAMI --}}
<div class="form-row">
    <div class="form-group col-md-2">
        <label for="citizen_wali">Warga Negara <span class="text-danger">*</span></label>
        <select class="form-control @error('citizen_wali') is-invalid @enderror" id="citizen_wali"
            @disabled($married->status > 2) name="citizen_wali">
            <option value="">Pilih Warga Negara</option>
            <option value="WNI"
                {{ $married->walis?->citizen_wali == 'WNI' || old('citizen_wali') == 'WNI' ? 'selected' : '' }}>
                WNI</option>
            <option value="WNA"
                {{ $married->walis?->citizen_wali == 'WNA' || old('citizen_wali') == 'WNA' ? 'selected' : '' }}>
                WNA
            </option>
        </select>
        @error('citizen_wali')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-2">
        <label>Negara Asal <span class="text-danger">*</span></label>
        <input type="text" name="nationality_wali" id="nationality_wali"
            class="form-control @error('nationality_wali') is-invalid @enderror" @disabled($married->status > 2)
            value="{{ $married->walis?->nationality_wali != null ? $married->walis?->nationality_wali : old('nationality_wali') }}"
            placeholder="INDONESIA">
        @error('nationality_wali')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-3">
        <label for="no_passport_wali">No Passport <span class="text-danger">*</span></label>
        <input type="text" name="no_passport_wali" id="no_passport_wali"
            class="form-control @error('no_passport_wali') is-invalid @enderror" @disabled($married->status > 2)
            value="{{ $married->walis?->no_passport_wali != null ? $married->walis?->no_passport_wali : old('no_passport_wali') }}">
        @error('no_passport_wali')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-2">
        <label for="status_wali">Status Wali <span class="text-danger">*</span></label>
        <select class="form-control @error('status_wali') is-invalid @enderror" id="status_wali"
            @disabled($married->status > 2) name="status_wali">
            <option value="">Pilih Status Wali</option>
            <option value="NASAB"
                {{ $married->walis?->status_wali == 'NASAB' || old('status_wali') == 'NASAB' ? 'selected' : '' }}>
                NASAB</option>
            <option value="HAKIM"
                {{ $married->walis?->status_wali == 'HAKIM' || old('status_wali') == 'HAKIM' ? 'selected' : '' }}>
                HAKIM
            </option>
        </select>
        @error('status_wali')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-3">
        <label for="hubungan_wali">Sebab/Alasan Wali Hakim <span class="text-danger">*</span></label>
        @php
            $reasonData = [
                'AYAH KANDUNG',
                'KAKEK (AYAH DARI AYAH KANDUNG)',
                '⁠AYAH DARI KAKEK (BUYUT)',
                '⁠SAUDARA LAK-LAKI SEBAPAK SEIBU',
                '⁠SAUDARA LAKI-LAKI SEBAPAK',
                '⁠ANAK LAKI-LAKI DARI SAUDARA LAKI-LAKI SEBAPAK SEIBU',
                '⁠ANAK LAKI-LAKI DARI SAUDADA LAKI-LAKI SEBAPAK',
                '⁠PAMAN (SAUDARA LAKI-LAKI BAPAK SEBAPAK SEIBU)',
                '⁠PAMAN SEBAPAK (SAUDARA LAKI-LAKI BAPAK SEBAPAK)',
                '⁠ANAK PAMAN SEBAPAK SEIBU',
                '⁠CUCU PAMAN SEBAPAK SEIBU',
                '⁠CUCU PAMAN SEBAPAK',
                '⁠PAMAN BAPAK SEBAPAK SEIBU',
                '⁠PAMAN BAPAK SEBAPAK',
                '⁠ANAK PAMAN BAPAK SEBAPAK SEIBU',
                '⁠ANAK PAMAN BAPAK SEBAPAK',
            ];
        @endphp
        <select class="form-control @error('hubungan_wali') is-invalid @enderror" @disabled($married->status > 2)
            name="hubungan_wali">
            <option value="">PILIH SEBAB WALI</option>
            @foreach ($reasonData as $reason)
                <option value="{{ $reason }}"
                    {{ old('hubungan_wali') == $reason || $married->walis?->hubungan_wali == $reason ? 'selected' : '' }}>
                    {{ $reason }}
                </option>
            @endforeach
        </select>
        @error('hubungan_wali')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="nik_wali">NIK <span class="text-danger">*</span></label>
        <input type="text" name="nik_wali" id="nik_wali"
            class="form-control @error('nik_wali') is-invalid @enderror" @disabled($married->status > 2)
            value="{{ $married->walis?->nik_wali != null ? $married->walis?->nik_wali : old('nik_wali') }}">
        @error('nik_wali')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-3">
        <label>Nama Wali <span class="text-danger">*</span></label>
        <input type="text" name="name_wali" id="name_wali"
            class="form-control @error('name_wali') is-invalid @enderror" @disabled($married->status > 2)
            value="{{ $married->walis?->name_wali != null ? $married->walis?->name_wali : old('name_wali') }}">
        @error('name_wali')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-3">
        <label>Nama Ayah Wali <span class="text-danger">*</span></label>
        <input type="text" name="name_father_wali" id="name_father_wali"
            class="form-control @error('name_father_wali') is-invalid @enderror" @disabled($married->status > 2)
            value="{{ $married->walis?->name_father_wali != null ? $married->walis?->name_father_wali : old('name_father_wali') }}">
        @error('name_father_wali')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

</div>

<div class="form-row">
    <div class="form-group col-md-5">
        <label><span class="text-danger">*</span></label>
        <input type="text" name="reason_wali" id="reason_wali"
            class="form-control @error('reason_wali') is-invalid @enderror" @disabled($married->status > 2)
            value="{{ $married->walis?->reason_wali != null ? $married->walis?->reason_wali : old('reason_wali') }}">
        @error('reason_wali')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-3">
        <label>Tempat Lahir <span class="text-danger">*</span></label>
        <input type="text" name="location_birth_wali" id="location_birth_wali"
            class="form-control @error('location_birth_wali') is-invalid @enderror" @disabled($married->status > 2)
            value="{{ $married->walis?->location_birth_wali != null ? $married->walis?->location_birth_wali : old('location_birth_wali') }}">
        @error('location_birth_wali')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-3">
        <label for="date_birth_wali">Tanggal Lahir <span class="text-danger">*</span></label>
        <input type="date" class="form-control" @disabled($married->status > 2) id="date_birth_wali"
            name="date_birth_wali"
            value="{{ old('date_birth_wali', optional($married->walis?->date_birth_wali)->format('Y-m-d')) }}">
        {{-- value="{{ $married->walis?->date_birth_wali != null ? $married->walis?->date_birth_wali->format('Y-m-d') : Carbon\Carbon::parse(old('date_birth_wali'))->format('Y-m-d') }}"> --}}
        @error('date_birth_wali')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-1">
        <label for="old_wali">Umur <span class="text-danger">*</span></label>
        <input type="text" name="old_wali" id="old_wali"
            class="form-control @error('old_wali') is-invalid @enderror" readonly
            value="{{ $married->walis?->old_wali != null ? $married->walis?->old_wali : old('old_wali') }}">
        @error('old_wali')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
        <label for="job_wali">Pekerjaan <span class="text-danger">*</span></label>
        <x-job name="job_wali" :selected="$married->walis?->job_wali != null ? $married->walis?->job_wali : old('job_wali')" :status="$married->status" />
    </div>
    <div class="form-group col-md-4">
        <label>No HP</label>
        <input type="text" name="number_phone_wali" id="number_phone_wali"
            class="form-control @error('number_phone_wali') is-invalid @enderror" @disabled($married->status > 2)
            value="{{ $married->walis?->number_phone_wali != null ? $married->walis?->number_phone_wali : old('number_phone_wali') }}">
        @error('number_phone_wali')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-4">
        <label for="religion_wali">Agama {{ $married->walis?->religion_wali }}<span
                class="text-danger">*</span></label>
        <x-religion name="religion_wali" :selected="$married->walis?->religion_wali != null ? $married->walis?->religion_wali : old('religion_wali')" :status="$married->status" />
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md">
        <label>Alamat</label>
        <input type="text" name="address_wali" id="address_wali"
            class="form-control @error('address_wali') is-invalid @enderror" @disabled($married->status > 2)
            value="{{ $married->walis?->address_wali != null ? $married->walis?->address_wali : old('address_wali') }}">
        @error('address_wali')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
{{-- END  DATA AYAH SUAMI --}}
