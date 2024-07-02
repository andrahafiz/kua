<div class="data-istri">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="wife-tab" data-toggle="tab" href="#wife" role="tab" aria-controls="wife"
                aria-selected="true">Istri</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="father_wife-tab" data-toggle="tab" href="#father_wife" role="tab"
                aria-controls="father_wife" aria-selected="false">Ayah Istri</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="mother_wife-tab" data-toggle="tab" href="#mother_wife" role="tab"
                aria-controls="mother_wife" aria-selected="false">Ibu Istri</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        {{-- DATA istri --}}
        <div class="tab-pane fade show active" id="wife" role="tabpanel" aria-labelledby="wife-tab">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="citizen_wife">Warga Negara <span class="text-danger">*</span></label>
                    <select class="form-control @error('citizen_wife') is-invalid @enderror"
                        @if ($married->status > 2) disabled @endif name="citizen_wife">
                        <option value="">Pilih Warga Negara</option>
                        <option value="WNI"
                            {{ $married->citizen_wife == 'WNI' || old('citizen_wife') == 'WNI' ? 'selected' : '' }}>
                            WNI
                        </option>
                        <option value="WNA"
                            {{ $married->citizen_wife == 'WNA' || old('citizen_wife') == 'WNA' ? 'selected' : '' }}>
                            WNA
                        </option>
                    </select>
                    @error('citizen_wife')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label>Negara Asal <span class="text-danger">*</span></label>
                    <input type="text" name="nationality_wife"
                        class="form-control @error('nationality_wife') is-invalid @enderror"
                        @if ($married->status > 2) disabled @endif
                        value="{{ $married->nationality_wife != null ? $married->nationality_wife : old('nationality_wife') }}"
                        placeholder="INDONESIA">
                    @error('nationality_wife')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="no_passport_wife">No. Passport <span class="text-danger">*</span></label>
                    <input type="text" name="no_passport_wife"
                        class="form-control @error('no_passport_wife') is-invalid @enderror"
                        @if ($married->status > 2) disabled @endif
                        value="{{ $married->no_passport_wife != null ? $married->no_passport_wife : old('no_passport_wife') }}">
                    @error('no_passport_wife')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="nik_wife">NIK <span class="text-danger">*</span></label>
                    <input type="text" name="nik_wife" class="form-control @error('nik_wife') is-invalid @enderror"
                        @if ($married->status > 2) disabled @endif
                        value="{{ $married->nik_wife != null ? $married->nik_wife : old('nik_wife') }}">
                    @error('nik_wife')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="name_wife">Nama <span class="text-danger">*</span></label>
                    <input type="text" name="name_wife" class="form-control @error('name_wife') is-invalid @enderror"
                        @if ($married->status > 2) disabled @endif
                        value="{{ $married->name_wife != null ? $married->name_wife : old('name_wife') }}">
                    @error('name_wife')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label>Tempat Lahir <span class="text-danger">*</span></label>
                    <input type="text" name="location_birth_wife"
                        class="form-control @error('location_birth_wife') is-invalid @enderror"
                        @if ($married->status > 2) disabled @endif
                        value="{{ $married->location_birth_wife != null ? $married->location_birth_wife : old('location_birth_wife') }}">
                    @error('location_birth_wife')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="date_birth_wife">Tanggal Lahir <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" @if ($married->status > 2) disabled @endif
                        id="date_birth_wife" name="date_birth_wife" max="{{ now()->format('Y-m-d') }}"
                        value="{{ old('date_birth_wife', optional($married->date_birth_wife)->format('Y-m-d')) }}">
                    {{-- value="{{ $married->date_birth_wife != null ? $married->date_birth_wife->format('Y-m-d') : Carbon\Carbon::parse(old('date_birth_wife'))->format('Y-m-d') }}"> --}}
                    @error('date_birth_wife')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-1">
                    <label for="old_wife">Umur <span class="text-danger">*</span></label>
                    <input type="text" name="old_wife" id="old_wife"
                        class="form-control @error('old_wife') is-invalid @enderror" disabled
                        value="{{ $married->old_wife != null ? $married->old_wife : old('old_wife') }}">
                    @error('old_wife')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="status_wife">Status <span class="text-danger">*</span></label>
                    <x-martial-status name="status_wife" :selected="$married->status_wife != null ? $married->status_wife : old('status_wife')" :status="$married->status" />
                </div>
                <div class="form-group col-md-6">
                    <label for="religion_wife">Agama <span class="text-danger">*</span></label>
                    <x-religion name="religion_wife" :selected="$married->religion_wife != null ? $married->religion_wife : old('religion_wife')" :status="$married->status" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="education_wife">Pendidikan <span class="text-danger">*</span></label>
                    <x-education name="education_wife" :selected="$married->education_wife != null ? $married->education_wife : old('education_wife')" :status="$married->status" />
                </div>
                <div class="form-group col-md-6">
                    <label for="job_wife">Pekerjaan <span class="text-danger">*</span></label>
                    <x-job name="job_wife" :selected="$married->job_wife != null ? $married->job_wife : old('job_wife')" :status="$married->status" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="phone_number_wife">No HP</label>
                    <input type="text" name="phone_number_wife"
                        class="form-control @error('phone_number_wife') is-invalid @enderror"
                        @if ($married->status > 2) disabled @endif
                        value="{{ $married->phone_number_wife != null ? $married->phone_number_wife : old('phone_number_wife') }}">
                    @error('phone_number_wife')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="text" name="email_wife"
                        class="form-control @error('email_wife') is-invalid @enderror"
                        @if ($married->status > 2) disabled @endif
                        value="{{ $married->email_wife != null ? $married->email_wife : old('email_wife') }}">
                    @error('email_wife')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label>Alamat <span class="text-danger">*</span></label>
                <input type="text" name="address_wife"
                    class="form-control @error('address_wife') is-invalid @enderror"
                    @if ($married->status > 2) disabled @endif
                    value="{{ $married->address_wife != null ? $married->address_wife : old('address_wife') }}">
                @error('address_wife')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Foto 2 X 3 Dengan Background Biru <span class="text-danger">*</span></label>
                <input type="file" class="form-control @error('photo_wife') is-invalid @enderror"
                    name="photo_wife" id="imageWife" />
                @error('photo_wife')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <span class="text-muted">Maximal Ukuran 200KB Format .jpg/.png</span>
                <div>
                    <img id="showImageWife" class="img-thumbnail p-2" src=""
                        style="width: 155px; height:230px">
                </div>
            </div>
        </div>
        {{-- END DATA istri --}}

        {{-- DATA AYAH istri --}}
        @includeIf('pages.catin.page-data-istri-ayah')
        {{-- END  DATA AYAH istri --}}

        {{-- DATA IBU istri --}}
        @includeIf('pages.catin.page-data-istri-ibu')
        {{-- END DATA IBU istri --}}

    </div>
</div>
