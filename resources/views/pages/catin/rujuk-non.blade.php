<div class="card-body pb-0">
    <div class="section-title">Data Pernikahan</div>
    <div class="row">
        <div class="col">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Nomor Akta Nikah</label>
                    {{-- <input type="text" class="form-control" name="akta_nikah" value="{{ $married?->akta_nikah_number }}"> --}}
                    <input class="form-control" type="text" name="akta_nikah_number"
                        class="form-control @error('akta_nikah_number') is-invalid @enderror"
                        @disabled($rujuk?->status == 2)
                        value="{{ $married->akta_nikah_number != null ? $married->akta_nikah_number : old('akta_nikah_number') }}"></input>
                    @error('akta_nikah_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label>Tanggal Akad</label>
                    <input type="date" name="akad_date_masehi"
                        class="form-control @error('akad_date_masehi') is-invalid @enderror"
                        @disabled($rujuk?->status == 2)
                        value="{{ old('akad_date_masehi', optional($married->akad_date_masehi)->format('Y-m-d')) }}">
                    @error('akad_date_masehi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label>Waktu Akad</label>
                    <input type="time" name="akad_time_masehi"
                        class="form-control @error('akad_time_masehi') is-invalid @enderror"
                        @disabled($rujuk?->status == 2)
                        value="{{ old('akad_time_masehi', optional($married->akad_date_masehi)->format('H:i')) }}">
                    {{-- value="{{ $married->akad_date_masehi != null ? $married->akad_date_masehi->format('H:i') : old('akad_time_masehi') }}"> --}}
                    @error('akad_time_masehi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label>Provinsi</label>
                    <input type="text" class="form-control" value="RIAU" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label>Kabupaten/Kota</label>
                    <input type="text" class="form-control" value="SINGINGI" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label>Kecamatan</label>
                    <input type="text" class="form-control" value="PANGEAN" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label>Nikah Di</label>
                    <select class="form-control @error('married_on') is-invalid @enderror" id="married_on"
                        @disabled($rujuk?->status == 2) name="married_on">
                        <option value="DI LUAR KUA"
                            {{ $married->married_on == 'DI LUAR KUA' || old('married_on') == 'DI LUAR KUA' ? 'selected' : '' }}>
                            DI LUAR KUA</option>
                        <option value="DI KUA"
                            {{ $married->married_on == 'DI KUA' || old('married_on') == 'DI KUA' ? 'selected' : '' }}>
                            DI KUA
                        </option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>KUA</label>
                    <input type="text" name="kua" class="form-control @error('kua') is-invalid @enderror"
                        readonly value="KUA PANGEAN">
                    @error('kua')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-2">
                    <label>Desa/Kelurahan/Wali Nagari</label>
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
                        @disabled($rujuk?->status == 2) name="desa_location">
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
            </div>

            <div class="form-group mb-0">
                <label>Alamat Lokasi Akad Nikah</label>
                <input class="form-control" type="text" name="akad_location"
                    class="form-control @error('akad_location') is-invalid @enderror" @disabled($rujuk?->status == 2)
                    value="{{ $married->akad_location != null ? $married->akad_location : old('akad_location') }}"></input>
                @error('akad_location')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="section-title">Data Mempelai</div>
    <div class="row">
        <div class="col">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>NIK Suami</label>
                    <input type="text" name="nik_husband"
                        class="form-control @error('nik_husband') is-invalid @enderror" @disabled($rujuk?->status == 2)
                        value="{{ $married->husbands?->nik_husband != null ? $married->husbands?->nik_husband : old('nik_husband') }}">
                    @error('nik_husband')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label>NIK Istri</label>
                    <input type="text" name="nik_wife" class="form-control @error('nik_wife') is-invalid @enderror"
                        @disabled($rujuk?->status == 2)
                        value="{{ $married->wives?->nik_wife != null ? $married->wives?->nik_wife : old('nik_wife') }}">
                    @error('nik_wife')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nama Suami</label>
                    <input type="text" name="name_husband"
                        class="form-control @error('name_husband') is-invalid @enderror" @disabled($rujuk?->status == 2)
                        value="{{ $married->husbands?->name_husband != null ? $married->husbands?->name_husband : old('name_husband') }}">
                    @error('name_husband')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label>Nama Istri</label>
                    <input type="text" name="name_wife"
                        class="form-control @error('name_wife') is-invalid @enderror" @disabled($rujuk?->status == 2)
                        value="{{ $married->wives?->name_wife != null ? $married->wives?->name_wife : old('name_wife') }}">
                    @error('name_wife')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Tempat Tanggal Lahir Suami</label>
                    <div class="row">
                        <div class="col">
                            <input type="text" name="location_birth_husband"
                                class="form-control @error('location_birth_husband') is-invalid @enderror"
                                @disabled($rujuk?->status == 2)
                                value="{{ $married->husbands?->location_birth_husband != null ? $married->husbands?->location_birth_husband : old('location_birth_husband') }}">
                            @error('location_birth_husband')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="date" class="form-control @error('ktp_husband') is-invalid @enderror"
                                @disabled($rujuk?->status == 2) id="date_birth_husband" name="date_birth_husband"
                                max="{{ now()->format('Y-m-d') }}"
                                value="{{ old('date_birth_husband', optional($married->husbands?->date_birth_husband)->format('Y-m-d')) }}">
                            @error('date_birth_husband')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label>Tempat Tanggal Lahir Istri</label>
                    <div class="row">
                        <div class="col">
                            <input type="text" name="location_birth_wife"
                                class="form-control @error('location_birth_wife') is-invalid @enderror"
                                @disabled($rujuk?->status == 2)
                                value="{{ $married->wives?->location_birth_wife != null ? $married->wives?->location_birth_wife : old('location_birth_wife') }}">
                            @error('location_birth_wife')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="date" class="form-control @error('ktp_wife') is-invalid @enderror"
                                @disabled($rujuk?->status == 2) id="date_birth_wife" name="date_birth_wife"
                                max="{{ now()->format('Y-m-d') }}"
                                value="{{ old('date_birth_wife', optional($married->wives?->date_birth_wife)->format('Y-m-d')) }}">
                            @error('date_birth_wife')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Alamat Suami</label>
                    <input type="text" name="address_husband"
                        class="form-control @error('address_husband') is-invalid @enderror"
                        @disabled($rujuk?->status == 2)
                        value="{{ $married->husbands?->address_husband != null ? $married->husbands?->address_husband : old('address_husband') }}">
                    @error('address_husband')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label>Alamat Istri</label>
                    <input type="text" name="address_wife"
                        class="form-control @error('address_wife') is-invalid @enderror" @disabled($rujuk?->status == 2)
                        value="{{ $married->wives?->address_wife != null ? $married->wives?->address_wife : old('address_wife') }}">
                    @error('address_wife')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nomor Telpon Suami</label>
                    <input type="text" name="phone_number_husband"
                        class="form-control @error('phone_number_husband') is-invalid @enderror"
                        @disabled($rujuk?->status == 2)
                        value="{{ $married->husbands?->phone_number_husband != null ? $married->husbands?->phone_number_husband : old('phone_number_husband') }}">
                    @error('phone_number_husband')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label>Nomor Telpon Istri</label>
                    <input type="text" name="phone_number_wife"
                        class="form-control @error('phone_number_wife') is-invalid @enderror"
                        @disabled($rujuk?->status == 2)
                        value="{{ $married->wives?->phone_number_wife != null ? $married->wives?->phone_number_wife : old('phone_number_wife') }}">
                    @error('phone_number_wife')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="section-title">Dokumen Rujuk</div>
    <div class="row">
        <div class="col">
            @if ($rujuk?->tanggal_verifikasi != null && $rujuk?->status == 2)
                <div class="form-group mb-0">
                    <h6 for="tanggal_verifikasi">Tanggal Verifikasi & Wawancara</h6>
                    <label class="d-block" for="tanggal_verifikasi">
                        @if ($rujuk?->tanggal_verifikasi != null)
                            <span>
                                {{ $rujuk->tanggal_verifikasi?->isoFormat('dddd, D MMMM Y HH:mm') ?? 'Belum ditentukan' }}

                            </span>
                        @endif
                    </label>
                </div>
            @endif
            @if ($rujuk?->berita_acara != null && $rujuk?->status == 2)
                <div class="form-group mb-0">
                    <h6 for="berita_acara">Berita Acara</h6>
                    <label class="d-block" for="berita_acara">
                        @if ($rujuk?->berita_acara != null)
                            <a href="{{ Helper::setUrlDocument('rujuk/' . $rujuk->berita_acara) }}"
                                target="blank">Lihat
                                Dokumen</a>
                        @endif
                    </label>
                </div>
            @endif
            <div class="form-group mb-0">
                @if ($rujuk?->ktp_husband != null && $rujuk?->status == 2)
                    <h6 for="ktp_husband">KTP Suami</h6>
                    <label class="d-block" for="ktp_husband">
                        @if ($rujuk?->ktp_husband != null)
                            <a href="{{ Helper::setUrlDocument('rujuk/' . $rujuk->ktp_husband) }}"
                                target="blank">Lihat
                                Dokumen</a>
                        @endif
                    </label>
                @else
                    <label for="ktp_husband">KTP Suami<span class="text-danger">*</span></label>
                    <input type="file" class="form-control @error('ktp_husband') is-invalid @enderror"
                        @readonly($rujuk?->status == 2) id="ktp_husband" name="ktp_husband">
                    @error('ktp_husband')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <label class="d-block" for="ktp_husband">
                        @if ($rujuk?->ktp_husband != null)
                            <a href="{{ Helper::setUrlDocument('rujuk/' . $rujuk->ktp_husband) }}"
                                target="blank">Lihat
                                Dokumen</a>
                        @endif
                    </label>
                @endif
            </div>

            <div class="form-group mb-0">
                @if ($rujuk?->ktp_wife != null && $rujuk?->status == 2)
                    <h6 for="ktp_wife">KTP Suami</h6>
                    <label class="d-block" for="ktp_wife">
                        @if ($rujuk?->ktp_wife != null)
                            <a href="{{ Helper::setUrlDocument('rujuk/' . $rujuk->ktp_wife) }}" target="blank">Lihat
                                Dokumen</a>
                        @endif
                    </label>
                @else
                    <label for="ktp_wife">KTP Istri<span class="text-danger">*</span></label>
                    <input type="file" class="form-control @error('ktp_wife') is-invalid @enderror"
                        @readonly($rujuk?->status == 2) id="ktp_wife" name="ktp_wife">
                    @error('ktp_wife')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <label class="d-block" for="ktp_wife">
                        @if ($rujuk?->ktp_wife != null)
                            <a href="{{ Helper::setUrlDocument('rujuk/' . $rujuk->ktp_wife) }}" target="blank">Lihat
                                Dokumen</a>
                        @endif
                    </label>
                @endif
            </div>

            <div class="form-group mb-0">
                @if ($rujuk?->buku_nikah != null && $rujuk?->status == 2)
                    <h6 for="buku_nikah">Buku Nikah</h6>
                    <label class="d-block" for="buku_nikah">
                        @if ($rujuk?->buku_nikah != null)
                            <a href="{{ Helper::setUrlDocument('rujuk/' . $rujuk->buku_nikah) }}"
                                target="blank">Lihat
                                Dokumen</a>
                        @endif
                    </label>
                @else
                    <label for="buku_nikah">Buku Nikah</label>
                    <input type="file" class="form-control @error('buku_nikah') is-invalid @enderror"
                        @readonly($rujuk?->status == 2) id="buku_nikah" name="buku_nikah">
                    @error('buku_nikah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <label class="d-block" for="buku_nikah">
                        @if ($rujuk?->buku_nikah != null)
                            <a href="{{ Helper::setUrlDocument('rujuk/' . $rujuk->buku_nikah) }}"
                                target="blank">Lihat
                                Dokumen</a>
                        @endif
                    </label>
                @endif
            </div>

            <div class="form-group mb-0">
                @if ($rujuk?->akta_cerai != null && $rujuk?->status == 2)
                    <h6 for="akta_cerai">Akta Cerai</h6>
                    <label class="d-block" for="akta_cerai">
                        @if ($rujuk?->akta_cerai != null)
                            <a href="{{ Helper::setUrlDocument('rujuk/' . $rujuk->akta_cerai) }}"
                                target="blank">Lihat
                                Dokumen</a>
                        @endif
                    </label>
                @else
                    <label for="akta_cerai">Akta Cerai</label>
                    <input type="file" class="form-control @error('akta_cerai') is-invalid @enderror"
                        @readonly($rujuk?->status == 2) id="akta_cerai" name="akta_cerai">
                    @error('akta_cerai')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <label class="d-block" for="akta_cerai">
                        @if ($rujuk?->akta_cerai != null)
                            <a href="{{ Helper::setUrlDocument('rujuk/' . $rujuk->akta_cerai) }}"
                                target="blank">Lihat
                                Dokumen</a>
                        @endif
                    </label>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="card-footer pt-0">
    <hr />
    @if ($rujuk?->status == 2)
        <button class="btn btn-icon btn-lg icon-left btn-warning btn-block">
            <i class="fas fa-exclamation-triangle"></i> Data anda sudah validasi oleh
            staff kami. Data tidak dapat diubah lagi</button>
    @else
        <button type="submit" name="action" value="rujuk-non-regis"
            class="btn btn-icon btn-lg icon-left btn-primary btn-block">
            <i class="fas fa-check"></i> Ajukan Rujuk</button>
    @endif
</div>
