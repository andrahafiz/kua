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
        {{-- DATA SUAMI --}}
        <div class="tab-pane fade show active" id="wife" role="tabpanel" aria-labelledby="wife-tab">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="citizen_wife">Warga Negara <span class="text-danger">*</span></label>
                    <select class="form-control @error('citizen_wife') is-invalid @enderror"
                        @disabled($married->status > 2) name="citizen_wife">
                        <option value="">Pilih Warga Negara</option>
                        <option value="WNI"
                            {{ $married->wives?->citizen_wife == 'WNI' || old('citizen_wife') == 'WNI' ? 'selected' : '' }}>
                            WNI
                        </option>
                        <option value="WNA"
                            {{ $married->wives?->citizen_wife == 'WNA' || old('citizen_wife') == 'WNA' ? 'selected' : '' }}>
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
                        @disabled($married->status > 2)
                        value="{{ $married->wives?->nationality_wife != null ? $married->wives?->nationality_wife : old('nationality_wife') }}"
                        placeholder="INDONESIA">
                    @error('nationality_wife')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="no_passport_wife">No. Passport <span class="text-danger">*</span></label>
                    <input type="text" name="no_passport_wife"
                        class="form-control @error('no_passport_wife') is-invalid @enderror"
                        @disabled($married->status > 2)
                        value="{{ $married->wives?->no_passport_wife != null ? $married->wives?->no_passport_wife : old('no_passport_wife') }}">
                    @error('no_passport_wife')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="nik_wife">NIK <span class="text-danger">*</span></label>
                    <input type="text" name="nik_wife" class="form-control @error('nik_wife') is-invalid @enderror"
                        @disabled($married->status > 2)
                        value="{{ $married->wives?->nik_wife != null ? $married->wives?->nik_wife : old('nik_wife') }}">
                    @error('nik_wife')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="name_wife">Nama <span class="text-danger">*</span></label>
                    <input type="text" name="name_wife" class="form-control @error('name_wife') is-invalid @enderror"
                        @disabled($married->status > 2)
                        value="{{ $married->wives?->name_wife != null ? $married->wives?->name_wife : old('name_wife') }}">
                    @error('name_wife')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label>Tempat Lahir <span class="text-danger">*</span></label>
                    <input type="text" name="location_birth_wife"
                        class="form-control @error('location_birth_wife') is-invalid @enderror"
                        @disabled($married->status > 2)
                        value="{{ $married->wives?->location_birth_wife != null ? $married->wives?->location_birth_wife : old('location_birth_wife') }}">
                    @error('location_birth_wife')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="date_birth_wife">Tanggal Lahir <span class="text-danger">*</span></label>
                    <input type="date" class="form-control @error('ktp_wife') is-invalid @enderror"
                        @disabled($married->status > 2) id="date_birth_wife" name="date_birth_wife"
                        max="{{ now()->format('Y-m-d') }}"
                        value="{{ old('date_birth_wife', optional($married->wives?->date_birth_wife)->format('Y-m-d')) }}">
                    @error('date_birth_wife')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-1">
                    <label for="old_wife">Umur <span class="text-danger">*</span></label>
                    <input type="text" name="old_wife" id="old_wife"
                        class="form-control @error('old_wife') is-invalid @enderror" readonly
                        value="{{ $married->wives?->old_wife != null ? $married->wives?->old_wife : old('old_wife') }}">
                    @error('old_wife')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="status_wife">Status <span class="text-danger">*</span></label>
                    <x-martial-status name="status_wife" :selected="$married->wives?->status_wife != null
                        ? $married->wives?->status_wife
                        : old('status_wife')" :status="$married->status" />
                </div>
                <div class="form-group col-md-6">
                    <label for="religion_wife">Agama <span class="text-danger">*</span></label>
                    <input type="text" name="religion_wife" id="religion_wife"
                        class="form-control @error('religion_wife') is-invalid @enderror" readonly value="Islam">
                    @error('religion_wife')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="education_wife">Pendidikan <span class="text-danger">*</span></label>
                    <x-education name="education_wife" :selected="$married->wives?->education_wife != null
                        ? $married->wives?->education_wife
                        : old('education_wife')" :status="$married->status" />
                </div>
                <div class="form-group col-md-6">
                    <label for="job_wife">Pekerjaan <span class="text-danger">*</span></label>
                    <x-job name="job_wife" :selected="$married->wives?->job_wife != null ? $married->wives?->job_wife : old('job_wife')" :status="$married->status" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="phone_number_wife">No HP</label>
                    <input type="text" name="phone_number_wife"
                        class="form-control @error('phone_number_wife') is-invalid @enderror"
                        @disabled($married->status > 2)
                        value="{{ $married->wives?->phone_number_wife != null ? $married->wives?->phone_number_wife : old('phone_number_wife') }}">
                    @error('phone_number_wife')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="text" name="email_wife"
                        class="form-control @error('email_wife') is-invalid @enderror" @disabled($married->status > 2)
                        value="{{ $married->wives?->email_wife != null ? $married->wives?->email_wife : old('email_wife') }}">
                    @error('email_wife')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label>Alamat <span class="text-danger">*</span></label>
                <input type="text" name="address_wife"
                    class="form-control @error('address_wife') is-invalid @enderror" @disabled($married->status > 2)
                    value="{{ $married->wives?->address_wife != null ? $married->wives?->address_wife : old('address_wife') }}">
                @error('address_wife')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="section-title">Dokumen</div>

            <div class="form-group">
                <label>Foto 2 X 3 Dengan Background Biru <span class="text-danger">*</span></label>
                <input type="file" class="form-control @error('photo_wife') is-invalid @enderror"
                    name="photo_wife" id="imageWife" @disabled($married->status > 2) />
                @error('photo_wife')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <span class="text-muted">Maximal Ukuran 200KB Format .jpg/.png</span>
                <label class="" for="photo_wife">
                    @if ($documentmarried?->photo_wife != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->photo_wife) }}" target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
                <div>
                    <img id="showImageWife" class="img-thumbnail p-2"
                        src="{{ Helper::setUrlDocument($documentmarried?->photo_wife) }}"
                        style="width: 155px; height:230px">
                </div>
            </div>

            <div class="form-group mb-0">
                <label for="ktp_wife">KTP <span class="text-danger">*</span></label>
                <input type="file" class="form-control @error('ktp_wife') is-invalid @enderror"
                    @disabled($married->status > 2) id="ktp_wife" name="ktp_wife">
                @error('ktp_wife')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="" for="ktp_wife">
                    @if ($documentmarried?->ktp_wife != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->ktp_wife) }}" target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
            </div>

            <div class="form-group mb-0">
                <label for="kk_wife">Kartu Keluarga <span class="text-danger">*</span></label>
                <input type="file" class="form-control @error('kk_wife') is-invalid @enderror"
                    @disabled($married->status > 2) id="kk_wife" name="kk_wife">
                @error('kk_wife')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="" for="kk_wife">
                    @if ($documentmarried?->kk_wife != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->kk_wife) }}" target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
            </div>

            <div class="form-group mb-0">
                <label for="akta_wife">Akta Lahir <span class="text-danger">*</span></label>
                <input type="file" class="form-control @error('akta_wife') is-invalid @enderror"
                    @disabled($married->status > 2) id="akta_wife" name="akta_wife">
                @error('akta_wife')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="" for="akta_wife">
                    @if ($documentmarried?->akta_wife != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->akta_wife) }}" target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
            </div>

            <div class="form-group mb-0">
                <label for="ijazah_wife">Ijazah Terakhir <span class="text-danger">*</span></label>
                <input type="file" class="form-control @error('ijazah_wife') is-invalid @enderror"
                    @disabled($married->status > 2) id="ijazah_wife" name="ijazah_wife">
                @error('ijazah_wife')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="" for="ijazah_wife">
                    @if ($documentmarried?->ijazah_wife != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->ijazah_wife) }}" target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
            </div>

            <div class="form-group mb-0">
                <label for="surat_keterangan_wali_nikah_wife">Surat Keterangan Wali Nikah <span
                        class="text-danger">*</span></label>
                <input type="file"
                    class="form-control @error('surat_keterangan_wali_nikah_wife') is-invalid @enderror"
                    @disabled($married->status > 2) id="surat_keterangan_wali_nikah_wife"
                    name="surat_keterangan_wali_nikah_wife">
                @error('surat_keterangan_wali_nikah_wife')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="" for="surat_keterangan_wali_nikah_wife">
                    @if ($documentmarried?->surat_keterangan_wali_nikah_wife != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->surat_keterangan_wali_nikah_wife) }}"
                            target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
            </div>

            <div class="form-group mb-0">
                <label for="N1_wife">N1-Surat pengantar nikah dari kepala desa / lurah <span
                        class="text-danger">*</span></label>
                <input type="file" class="form-control @error('N1_wife') is-invalid @enderror"
                    @disabled($married->status > 2) id="N1_wife" name="N1_wife">
                @error('N1_wife')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="" for="N1_wife">
                    @if ($documentmarried?->N1_wife != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->N1_wife) }}" target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
            </div>

            <div class="form-group mb-0">
                <label for="N4_wife">N4-Surat Persetujuan Mempelai <span class="text-danger">*</span></label>
                <input type="file" class="form-control @error('N4_wife') is-invalid @enderror"
                    @disabled($married->status > 2) id="N4_wife" name="N4_wife">
                @error('N4_wife')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="" for="N4_wife">
                    @if ($documentmarried?->N4_wife != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->N4_wife) }}" target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
            </div>

            <div class="form-group mb-0">
                <label for="N2_wife">N2-Surat Permohonan Kehendak Kawin <span class="text-danger">*</span></label>
                <input type="file" class="form-control @error('N2_wife') is-invalid @enderror"
                    @disabled($married->status > 2) id="N2_wife" name="N2_wife">
                @error('N2_wife')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="" for="N2_wife">
                    @if ($documentmarried?->N2_wife != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->N2_wife) }}" target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
            </div>

            <div class="form-group mb-0">
                <label for="N5_wife">N5-Surat Izin orang tua <span class="text-danger">*</span></label>
                <input type="file" class="form-control @error('N5_wife') is-invalid @enderror"
                    @disabled($married->status > 2) id="N5_wife" name="N5_wife">
                @error('N5_wife')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="" for="N5_wife">
                    @if ($documentmarried?->N5_wife != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->N5_wife) }}" target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
            </div>

            <div class="form-group mb-0">
                <label for="akta_cerai_wife">Akta Cerai</label>
                <input type="file" class="form-control @error('akta_cerai_wife') is-invalid @enderror"
                    @disabled($married->status > 2) id="akta_cerai_wife" name="akta_cerai_wife">
                <span class="text-muted">Bagi calon yang berstatus duda/janda</span></span>
                @error('akta_cerai_wife')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="d-block" for="akta_cerai_wife">
                    @if ($documentmarried?->akta_cerai_wife != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->akta_cerai_wife) }}"
                            target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
            </div>

            <div class="form-group mb-0">
                <label for="akta_kematian_wife">Akta Kematian</label>
                <input type="file" class="form-control @error('akta_kematian_wife') is-invalid @enderror"
                    @disabled($married->status > 2) id="akta_kematian_wife" name="akta_kematian_wife">
                <span class="text-muted">Bagi calon yang berstatus duda/janda</span></span>
                @error('akta_kematian_wife')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="d-block" for="akta_kematian_wife">
                    @if ($documentmarried?->akta_kematian_wife != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->akta_kematian_wife) }}"
                            target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
            </div>

            <div class="form-group mb-0">
                <label for="surat_dispensasi_wife">Surat Dispensasi Pengadilan Agama</label>
                <input type="file" class="form-control @error('surat_dispensasi_wife') is-invalid @enderror"
                    @disabled($married->status > 2) id="surat_dispensasi_wife" name="surat_dispensasi_wife">
                <span class="text-muted">Bagi calon yang dibawah 19 Tahun</span></span>
                @error('surat_dispensasi_wife')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="d-block" for="surat_dispensasi_wife">
                    @if ($documentmarried?->surat_dispensasi_wife != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->surat_dispensasi_wife) }}"
                            target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
            </div>

            <div class="form-group mb-0">
                <label for="rekomendasi_kua_wife">Rekomendasi dari KUA asal</label>
                <input type="file" class="form-control @error('rekomendasi_kua_wife') is-invalid @enderror"
                    @disabled($married->status > 2) id="rekomendasi_kua_wife" name="rekomendasi_kua_wife">
                <span class="text-muted">Bagi calon yang dari kecamatan lain</span></span>
                @error('rekomendasi_kua_wife')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="d-block" for="rekomendasi_kua_wife">
                    @if ($documentmarried?->rekomendasi_kua_wife != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->rekomendasi_kua_wife) }}"
                            target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
            </div>

            <div class="form-group mb-0">
                <label for="surat_izin_komandan_wife">Surat Izin Komandan</label>
                <input type="file" class="form-control @error('surat_izin_komandan_wife') is-invalid @enderror"
                    @disabled($married->status > 2) id="surat_izin_komandan_wife" name="surat_izin_komandan_wife">
                <span class="text-muted">Bagi calon pengantin TNI ataupun POLRI</span></span>
                @error('surat_izin_komandan_wife')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="d-block" for="surat_izin_komandan_wife">
                    @if ($documentmarried?->surat_izin_komandan_wife != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->surat_izin_komandan_wife) }}"
                            target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
            </div>

            <div class="form-group mb-0">
                <label for="surat_kedutaan_wife">Surat Kedutaan</label>
                <input type="file" class="form-control @error('surat_kedutaan_wife') is-invalid @enderror"
                    @disabled($married->status > 2) id="surat_kedutaan_wife" name="surat_kedutaan_wife">
                <span class="text-muted">Bagi calon pengantin WNA</span></span>
                @error('surat_kedutaan_wife')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="d-block" for="surat_kedutaan_wife">
                    @if ($documentmarried?->surat_kedutaan_wife != null)
                        <a href="{{ Helper::setUrlDocument($documentmarried->surat_kedutaan_wife) }}"
                            target="blank">Lihat
                            Dokumen</a>
                    @endif
                </label>
            </div>

        </div>
        {{-- END DATA SUAMI --}}

        {{-- DATA AYAH SUAMI --}}
        @includeIf('pages.catin.page-data-istri-ayah')
        {{-- END  DATA AYAH SUAMI --}}

        {{-- DATA IBU SUAMI --}}
        @includeIf('pages.catin.page-data-istri-ibu')
        {{-- END DATA IBU SUAMI --}}

    </div>
</div>
