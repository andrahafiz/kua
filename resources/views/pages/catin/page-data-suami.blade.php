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
                        @disabled($married->status > 2) name="citizen_husband">
                        <option value="">Pilih Warga Negara</option>
                        <option value="WNI"
                            {{ $married->husbands->citizen_husband == 'WNI' || old('citizen_husband') == 'WNI' ? 'selected' : '' }}>
                            WNI
                        </option>
                        <option value="WNA"
                            {{ $married->husbands->citizen_husband == 'WNA' || old('citizen_husband') == 'WNA' ? 'selected' : '' }}>
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
                        @disabled($married->status > 2)
                        value="{{ $married->husbands->nationality_husband != null ? $married->husbands->nationality_husband : old('nationality_husband') }}"
                        placeholder="INDONESIA">
                    @error('nationality_husband')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="no_passport_husband">No. Passport <span class="text-danger">*</span></label>
                    <input type="text" name="no_passport_husband"
                        class="form-control @error('no_passport_husband') is-invalid @enderror"
                        @disabled($married->status > 2)
                        value="{{ $married->husbands->no_passport_husband != null ? $married->husbands->no_passport_husband : old('no_passport_husband') }}">
                    @error('no_passport_husband')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="nik_husband">NIK <span class="text-danger">*</span></label>
                    <input type="text" name="nik_husband"
                        class="form-control @error('nik_husband') is-invalid @enderror" @disabled($married->status > 2)
                        value="{{ $married->husbands->nik_husband != null ? $married->husbands->nik_husband : old('nik_husband') }}">
                    @error('nik_husband')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="name_husband">Nama <span class="text-danger">*</span></label>
                    <input type="text" name="name_husband"
                        class="form-control @error('name_husband') is-invalid @enderror" @disabled($married->status > 2)
                        value="{{ $married->husbands->name_husband != null ? $married->husbands->name_husband : old('name_husband') }}">
                    @error('name_husband')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label>Tempat Lahir <span class="text-danger">*</span></label>
                    <input type="text" name="location_birth_husband"
                        class="form-control @error('location_birth_husband') is-invalid @enderror"
                        @disabled($married->status > 2)
                        value="{{ $married->husbands->location_birth_husband != null ? $married->husbands->location_birth_husband : old('location_birth_husband') }}">
                    @error('location_birth_husband')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="date_birth_husband">Tanggal Lahir <span class="text-danger">*</span></label>
                    <input type="date" class="form-control @error('ktp_husband') is-invalid @enderror"
                        @disabled($married->status > 2) id="date_birth_husband" name="date_birth_husband"
                        max="{{ now()->format('Y-m-d') }}"
                        value="{{ old('date_birth_husband', optional($married->husbands->date_birth_husband)->format('Y-m-d')) }}">
                    @error('date_birth_husband')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-1">
                    <label for="old_husband">Umur <span class="text-danger">*</span></label>
                    <input type="text" name="old_husband" id="old_husband"
                        class="form-control @error('old_husband') is-invalid @enderror" readonly
                        value="{{ $married->husbands->old_husband != null ? $married->husbands->old_husband : old('old_husband') }}">
                    @error('old_husband')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="status_husband">Status <span class="text-danger">*</span></label>
                    <x-martial-status name="status_husband" :selected="$married->husbands->status_husband != null
                        ? $married->husbands->status_husband
                        : old('status_husband')" :status="$married->status" />
                </div>
                <div class="form-group col-md-6">
                    <label for="religion_husband">Agama <span class="text-danger">*</span></label>
                    <x-religion name="religion_husband" :selected="$married->husbands->religion_husband != null
                        ? $married->husbands->religion_husband
                        : old('religion_husband')" :status="$married->status" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="education_husband">Pendidikan <span class="text-danger">*</span></label>
                    <x-education name="education_husband" :selected="$married->husbands->education_husband != null
                        ? $married->husbands->education_husband
                        : old('education_husband')" :status="$married->status" />
                </div>
                <div class="form-group col-md-6">
                    <label for="job_husband">Pekerjaan <span class="text-danger">*</span></label>
                    <x-job name="job_husband" :selected="$married->husbands->job_husband != null
                        ? $married->husbands->job_husband
                        : old('job_husband')" :status="$married->status" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="phone_number_husband">No HP</label>
                    <input type="text" name="phone_number_husband"
                        class="form-control @error('phone_number_husband') is-invalid @enderror"
                        @disabled($married->status > 2)
                        value="{{ $married->husbands->phone_number_husband != null ? $married->husbands->phone_number_husband : old('phone_number_husband') }}">
                    @error('phone_number_husband')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="text" name="email_husband"
                        class="form-control @error('email_husband') is-invalid @enderror" @disabled($married->status > 2)
                        value="{{ $married->husbands->email_husband != null ? $married->husbands->email_husband : old('email_husband') }}">
                    @error('email_husband')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label>Alamat <span class="text-danger">*</span></label>
                <input type="text" name="address_husband"
                    class="form-control @error('address_husband') is-invalid @enderror" @disabled($married->status > 2)
                    value="{{ $married->husbands->address_husband != null ? $married->husbands->address_husband : old('address_husband') }}">
                @error('address_husband')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="section-title">Dokumen</div>

            <div class="form-group">
                <label>Foto 2 X 3 Dengan Background Biru <span class="text-danger">*</span></label>
                <input type="file" class="form-control @error('photo_husband') is-invalid @enderror"
                    name="photo_husband" id="imageHusband" @disabled($married->status > 2) />
                @error('photo_husband')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <span class="text-muted">Maximal Ukuran 200KB Format .jpg/.png</span>
                <label class="" for="photo_husband">
                    @if ($documentmarried?->photo_husband != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->photo_husband) }}" target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
                <div>
                    <img id="showImageHusband" class="img-thumbnail p-2"
                        src="{{ Helper::setUrlDocument($documentmarried?->photo_husband) }}"
                        style="width: 155px; height:230px">
                </div>
            </div>

            <div class="form-group mb-0">
                <label for="ktp_husband">KTP <span class="text-danger">*</span></label>
                <input type="file" class="form-control @error('ktp_husband') is-invalid @enderror"
                    @disabled($married->status > 2) id="ktp_husband" name="ktp_husband">
                @error('ktp_husband')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="" for="ktp_husband">
                    @if ($documentmarried?->ktp_husband != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->ktp_husband) }}" target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
            </div>

            <div class="form-group mb-0">
                <label for="kk_husband">Kartu Keluarga <span class="text-danger">*</span></label>
                <input type="file" class="form-control @error('kk_husband') is-invalid @enderror"
                    @disabled($married->status > 2) id="kk_husband" name="kk_husband">
                @error('kk_husband')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="" for="kk_husband">
                    @if ($documentmarried?->kk_husband != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->kk_husband) }}" target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
            </div>

            <div class="form-group mb-0">
                <label for="akta_husband">Akta Lahir <span class="text-danger">*</span></label>
                <input type="file" class="form-control @error('akta_husband') is-invalid @enderror"
                    @disabled($married->status > 2) id="akta_husband" name="akta_husband">
                @error('akta_husband')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="" for="akta_husband">
                    @if ($documentmarried?->akta_husband != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->akta_husband) }}" target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
            </div>

            <div class="form-group mb-0">
                <label for="ijazah_husband">Ijazah Terakhir <span class="text-danger">*</span></label>
                <input type="file" class="form-control @error('ijazah_husband') is-invalid @enderror"
                    @disabled($married->status > 2) id="ijazah_husband" name="ijazah_husband">
                @error('ijazah_husband')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="" for="ijazah_husband">
                    @if ($documentmarried?->ijazah_husband != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->ijazah_husband) }}" target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
            </div>

            <div class="form-group mb-0">
                <label for="surat_keterangan_wali_nikah_husband">Surat Keterangan Wali Nikah <span
                        class="text-danger">*</span></label>
                <input type="file"
                    class="form-control @error('surat_keterangan_wali_nikah_husband') is-invalid @enderror"
                    @disabled($married->status > 2) id="surat_keterangan_wali_nikah_husband"
                    name="surat_keterangan_wali_nikah_husband">
                @error('surat_keterangan_wali_nikah_husband')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="" for="surat_keterangan_wali_nikah_husband">
                    @if ($documentmarried?->surat_keterangan_wali_nikah_husband != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->surat_keterangan_wali_nikah_husband) }}"
                            target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
            </div>

            <div class="form-group mb-0">
                <label for="N1_husband">N1-Surat pengantar nikah dari kepala desa / lurah <span
                        class="text-danger">*</span></label>
                <input type="file" class="form-control @error('N1_husband') is-invalid @enderror"
                    @disabled($married->status > 2) id="N1_husband" name="N1_husband">
                @error('N1_husband')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="" for="N1_husband">
                    @if ($documentmarried?->N1_husband != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->N1_husband) }}" target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
            </div>

            <div class="form-group mb-0">
                <label for="N4_husband">N4-Surat Persetujuan Mempelai <span class="text-danger">*</span></label>
                <input type="file" class="form-control @error('N4_husband') is-invalid @enderror"
                    @disabled($married->status > 2) id="N4_husband" name="N4_husband">
                @error('N4_husband')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="" for="N4_husband">
                    @if ($documentmarried?->N4_husband != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->N4_husband) }}" target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
            </div>

            <div class="form-group mb-0">
                <label for="N2_husband">N2-Surat Permohonan Kehendak Kawin <span class="text-danger">*</span></label>
                <input type="file" class="form-control @error('N2_husband') is-invalid @enderror"
                    @disabled($married->status > 2) id="N2_husband" name="N2_husband">
                @error('N2_husband')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="" for="N2_husband">
                    @if ($documentmarried?->N2_husband != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->N2_husband) }}" target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
            </div>

            <div class="form-group mb-0">
                <label for="N5_husband">N5-Surat Izin orang tua <span class="text-danger">*</span></label>
                <input type="file" class="form-control @error('N5_husband') is-invalid @enderror"
                    @disabled($married->status > 2) id="N5_husband" name="N5_husband">
                @error('N5_husband')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="" for="N5_husband">
                    @if ($documentmarried?->N5_husband != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->N5_husband) }}" target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
            </div>

            <div class="form-group mb-0">
                <label for="akta_cerai_husband">Akta Cerai</label>
                <input type="file" class="form-control @error('akta_cerai_husband') is-invalid @enderror"
                    @disabled($married->status > 2) id="akta_cerai_husband" name="akta_cerai_husband">
                <span class="text-muted">Bagi calon yang berstatus duda/janda</span></span>
                @error('akta_cerai_husband')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="d-block" for="akta_cerai_husband">
                    @if ($documentmarried?->akta_cerai_husband != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->akta_cerai_husband) }}"
                            target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
            </div>

            <div class="form-group mb-0">
                <label for="akta_kematian_husband">Akta Kematian</label>
                <input type="file" class="form-control @error('akta_kematian_husband') is-invalid @enderror"
                    @disabled($married->status > 2) id="akta_kematian_husband" name="akta_kematian_husband">
                <span class="text-muted">Bagi calon yang berstatus duda/janda</span></span>
                @error('akta_kematian_husband')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="d-block" for="akta_kematian_husband">
                    @if ($documentmarried?->akta_kematian_husband != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->akta_kematian_husband) }}"
                            target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
            </div>

            <div class="form-group mb-0">
                <label for="surat_dispensasi_husband">Surat Dispensasi Pengadilan Agama</label>
                <input type="file" class="form-control @error('surat_dispensasi_husband') is-invalid @enderror"
                    @disabled($married->status > 2) id="surat_dispensasi_husband" name="surat_dispensasi_husband">
                <span class="text-muted">Bagi calon yang dibawah 19 Tahun</span></span>
                @error('surat_dispensasi_husband')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="d-block" for="surat_dispensasi_husband">
                    @if ($documentmarried?->surat_dispensasi_husband != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->surat_dispensasi_husband) }}"
                            target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
            </div>

            <div class="form-group mb-0">
                <label for="rekomendasi_kua_husband">Rekomendasi dari KUA asal</label>
                <input type="file" class="form-control @error('rekomendasi_kua_husband') is-invalid @enderror"
                    @disabled($married->status > 2) id="rekomendasi_kua_husband" name="rekomendasi_kua_husband">
                <span class="text-muted">Bagi calon yang dari kecamatan lain</span></span>
                @error('rekomendasi_kua_husband')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="d-block" for="rekomendasi_kua_husband">
                    @if ($documentmarried?->rekomendasi_kua_husband != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->rekomendasi_kua_husband) }}"
                            target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
            </div>

            <div class="form-group mb-0">
                <label for="surat_izin_komandan_husband">Surat Izin Komandan</label>
                <input type="file" class="form-control @error('surat_izin_komandan_husband') is-invalid @enderror"
                    @disabled($married->status > 2) id="surat_izin_komandan_husband" name="surat_izin_komandan_husband">
                <span class="text-muted">Bagi calon pengantin TNI ataupun POLRI</span></span>
                @error('surat_izin_komandan_husband')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="d-block" for="surat_izin_komandan_husband">
                    @if ($documentmarried?->surat_izin_komandan_husband != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->surat_izin_komandan_husband) }}"
                            target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
            </div>

            <div class="form-group mb-0">
                <label for="surat_kedutaan_husband">Surat Kedutaan</label>
                <input type="file" class="form-control @error('surat_kedutaan_husband') is-invalid @enderror"
                    @disabled($married->status > 2) id="surat_kedutaan_husband" name="surat_kedutaan_husband">
                <span class="text-muted">Bagi calon pengantin WNA</span></span>
                @error('surat_kedutaan_husband')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="d-block" for="surat_kedutaan_husband">
                    @if ($documentmarried?->surat_kedutaan_husband != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->surat_kedutaan_husband) }}"
                            target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
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
