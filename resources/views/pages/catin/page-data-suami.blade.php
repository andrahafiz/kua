<div class="data-suami">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="husband-tab" data-toggle="tab" href="#husband" role="tab"
                aria-controls="husband" aria-selected="true">Suami</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="father_husband-tab" data-toggle="tab" href="#father_husband" role="tab"
                aria-controls="father_husband" aria-selected="false">Ayah Suami</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="mother_husband-tab" data-toggle="tab" href="#mother_husband" role="tab"
                aria-controls="mother_husband" aria-selected="false">Ibu Suami</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        {{-- DATA SUAMI --}}
        <div class="tab-pane fade show active" id="husband" role="tabpanel" aria-labelledby="husband-tab">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="citizen_husband">Warga Negara <span class="text-danger">*</span></label>
                    <select class="form-control @error('citizen_husband') is-invalid @enderror"
                        @if ($married->status > 2) disabled @endif name="citizen_husband">
                        <option value="">Pilih Warga Negara</option>
                        <option value="WNI"
                            {{ $married->citizen_husband == 'WNI' || old('citizen_husband') == 'WNI' ? 'selected' : '' }}>
                            WNI
                        </option>
                        <option value="WNA"
                            {{ $married->citizen_husband == 'WNA' || old('citizen_husband') == 'WNA' ? 'selected' : '' }}>
                            WNA
                        </option>
                    </select>
                    @error('citizen_husband')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label>Negara Asal <span class="text-danger">*</span></label>
                    <input type="text" name="nationality_husband"
                        class="form-control @error('nationality_husband') is-invalid @enderror"
                        @if ($married->status > 2) disabled @endif
                        value="{{ $married->nationality_husband != null ? $married->nationality_husband : old('nationality_husband') }}"
                        placeholder="INDONESIA">
                    @error('nationality_husband')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="no_passport_husband">No. Passport <span class="text-danger">*</span></label>
                    <input type="text" name="no_passport_husband"
                        class="form-control @error('no_passport_husband') is-invalid @enderror"
                        @if ($married->status > 2) disabled @endif
                        value="{{ $married->no_passport_husband != null ? $married->no_passport_husband : old('no_passport_husband') }}">
                    @error('no_passport_husband')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="nik_husband">NIK <span class="text-danger">*</span></label>
                    <input type="text" name="nik_husband"
                        class="form-control @error('nik_husband') is-invalid @enderror"
                        @if ($married->status > 2) disabled @endif
                        value="{{ $married->nik_husband != null ? $married->nik_husband : old('nik_husband') }}">
                    @error('nik_husband')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="name_husband">Nama <span class="text-danger">*</span></label>
                    <input type="text" name="name_husband"
                        class="form-control @error('name_husband') is-invalid @enderror"
                        @if ($married->status > 2) disabled @endif
                        value="{{ $married->name_husband != null ? $married->name_husband : old('name_husband') }}">
                    @error('name_husband')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label>Tempat Lahir <span class="text-danger">*</span></label>
                    <input type="text" name="location_birth_husband"
                        class="form-control @error('location_birth_husband') is-invalid @enderror"
                        @if ($married->status > 2) disabled @endif
                        value="{{ $married->location_birth_husband != null ? $married->location_birth_husband : old('location_birth_husband') }}">
                    @error('location_birth_husband')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="date_birth_husband">Tanggal Lahir <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" @if ($married->status > 2) disabled @endif
                        id="date_birth_husband" name="date_birth_husband"
                        value="{{ $married->date_birth_husband != null ? $married->date_birth_husband->format('Y-m-d') : Carbon\Carbon::parse(old('date_birth_husband'))->format('Y-m-d') }}">
                    @error('date_birth_husband')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-1">
                    <label for="old_husband">Umur <span class="text-danger">*</span></label>
                    <input type="text" name="old_husband"
                        class="form-control @error('old_husband') is-invalid @enderror" disabled
                        value="{{ $married->old_husband != null ? $married->old_husband : old('old_husband') }}">
                    @error('old_husband')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="status_husband">Status <span class="text-danger">*</span></label>
                    <x-martial-status name="status_husband" :selected="$married->status_husband != null ? $married->status_husband : old('status_husband')" :status="$married->status" />
                </div>
                <div class="form-group col-md-6">
                    <label for="religion_husband">Agama <span class="text-danger">*</span></label>
                    <x-religion name="religion_husband" :selected="$married->religion_husband != null
                        ? $married->religion_husband
                        : old('religion_husband')" :status="$married->status" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="education_husband">Pendidikan <span class="text-danger">*</span></label>
                    <x-education name="education_husband" :selected="$married->education_husband != null
                        ? $married->education_husband
                        : old('education_husband')" :status="$married->status" />
                </div>
                <div class="form-group col-md-6">
                    <label for="job_husband">Pekerjaan <span class="text-danger">*</span></label>
                    <x-job name="job_husband" :selected="$married->job_husband != null ? $married->job_husband : old('job_husband')" :status="$married->status" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="phone_number_husband">No HP</label>
                    <input type="text" name="phone_number_husband"
                        class="form-control @error('phone_number_husband') is-invalid @enderror"
                        @if ($married->status > 2) disabled @endif
                        value="{{ $married->phone_number_husband != null ? $married->phone_number_husband : old('phone_number_husband') }}">
                    @error('phone_number_husband')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="text" name="email_husband"
                        class="form-control @error('email_husband') is-invalid @enderror"
                        @if ($married->status > 2) disabled @endif
                        value="{{ $married->email_husband != null ? $married->email_husband : old('email_husband') }}">
                    @error('email_husband')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label>Alamat <span class="text-danger">*</span></label>
                <input type="text" name="address_husband"
                    class="form-control @error('address_husband') is-invalid @enderror"
                    @if ($married->status > 2) disabled @endif
                    value="{{ $married->address_husband != null ? $married->address_husband : old('address_husband') }}">
                @error('address_husband')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Foto 2 X 3 Dengan Background Biru <span class="text-danger">*</span></label>
                <input type="file" class="form-control" name="photo_husband" id="imageHusband" />
                <span class="text-muted">Maximal Ukuran 200KB Format .jpg/.png</span>
                <div>
                    <img id="showImageHusband" class="img-thumbnail p-2" src=""
                        style="width: 155px; height:230px">
                </div>
            </div>
        </div>
        {{-- END DATA SUAMI --}}

        {{-- DATA AYAH SUAMI --}}
        @includeIf('pages.catin.page-data-suami-ayah')
        {{-- END  DATA AYAH SUAMI --}}

        {{-- DATA IBU SUAMI --}}
        @includeIf('pages.catin.page-data-suami-ibu')
        {{-- END DATA IBU SUAMI --}}

    </div>
</div>
