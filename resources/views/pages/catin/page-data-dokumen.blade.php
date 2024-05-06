<div class="data-dokumen">
    <div class="form-group row">
        <label for="N1" class="col-sm-4 col-lg-3 col-form-label">N1-Surat
            Keterangan Untuk Nikah (Dari Kelurahan) *</label>
        <div class="col-sm-8 col-lg-9">
            <input type="file" class="form-control" @if ($married->status > 2) disabled @endif id="N1"
                name="N1">
            <label class="" for="N1">
                @if ($documentmarried?->N1 != null)
                    <a href="{{ Helper::setUrlDocument($documentmarried->N1) }}" target="blank">Lihat
                        Dokumen</a>
                @endif
            </label>
        </div>
    </div>
    <div class="form-group row">
        <label for="N3" class="col-sm-4 col-lg-3 col-form-label">N3-Surat
            Persetujuan Mempelai *</label>
        <div class="col-sm-8 col-lg-9">
            <input type="file" class="form-control" @if ($married->status > 2) disabled @endif id="N3"
                name="N3">
            <label class="" for="N3">
                @if ($documentmarried?->N3 != null)
                    <a href="{{ Helper::setUrlDocument($documentmarried->N3) }}" target="blank">Lihat
                        Dokumen</a>
                @endif
            </label>
        </div>
    </div>
    <div class="form-group row">
        <label for="N5" class="col-sm-4 col-lg-3 col-form-label">N5-Surat
            Izin
            Orang Tua (Jika calon pengantin umurnya dibawah 21 Tahun)</label>
        <div class="col-sm-8 col-lg-9">
            <input type="file" class="form-control" @if ($married->status > 2) disabled @endif id="N5"
                name="N5">
            <label class="" for="N5">
                @if ($documentmarried?->N5 != null)
                    <a href="{{ Helper::setUrlDocument($documentmarried->N5) }}" target="blank">Lihat
                        Dokumen</a>
                @endif
            </label>
        </div>
    </div>
    <div class="form-group row">
        <label for="surat_akta_cerai" class="col-sm-4 col-lg-3 col-form-label">Surat
            Akta Cerai (Jika calon pengantin sudah cerai)</label>
        <div class="col-sm-8 col-lg-9">
            <input type="file" class="form-control" @if ($married->status > 2) disabled @endif
                id="surat_akta_cerai" name="surat_akta_cerai">
            <label class="" for="surat_akta_cerai">
                @if ($documentmarried?->surat_akta_cerai != null)
                    <a href="{{ Helper::setUrlDocument($documentmarried->surat_akta_cerai) }}" target="blank">Lihat
                        Dokumen</a>
                @endif
            </label>
        </div>
    </div>
    <div class="form-group row">
        <label for="surat_izin_komandan" class="col-sm-4 col-lg-3 col-form-label">Surat Izin Komandan (Jika
            calon
            pengantin TNI atau POLRI)</label>
        <div class="col-sm-8 col-lg-9">
            <input type="file" class="form-control" @if ($married->status > 2) disabled @endif
                id="surat_izin_komandan" name="surat_izin_komandan">
            <label class="" for="surat_izin_komandan">
                @if ($documentmarried?->surat_izin_komandan != null)
                    <a href="{{ Helper::setUrlDocument($documentmarried->surat_izin_komandan) }}" target="blank">Lihat
                        Dokumen</a>
                @endif
            </label>
        </div>
    </div>
    <div class="form-group row">
        <label for="ktp_husband" class="col-sm-4 col-lg-3 col-form-label">Identitas
            Diri (KTP *)</label>
        <div class="col-sm-8 col-lg-9">
            <input type="file" class="form-control" @if ($married->status > 2) disabled @endif
                id="ktp_husband" name="ktp_husband">
            <label class="" for="ktp_husband">
                @if ($documentmarried?->ktp_husband != null)
                    <a href="{{ Helper::setUrlDocument($documentmarried->ktp_husband) }}" target="blank">Lihat
                        Dokumen</a>
                @endif
            </label>
        </div>
    </div>
    <div class="form-group row">
        <label for="kk_husband" class="col-sm-4 col-lg-3 col-form-label">Kartu
            Keluarga *</label>
        <div class="col-sm-8 col-lg-9">
            <input type="file" class="form-control" @if ($married->status > 2) disabled @endif
                id="kk_husband" name="kk_husband">
            <label class="" for="kk_husband">
                @if ($documentmarried?->kk_husband != null)
                    <a href="{{ Helper::setUrlDocument($documentmarried->kk_husband) }}" target="blank">Lihat
                        Dokumen</a>
                @endif
            </label>
        </div>
    </div>
    <div class="form-group row">
        <label for="akta_husband" class="col-sm-4 col-lg-3 col-form-label">Akta
            Kelahiran *</label>
        <div class="col-sm-8 col-lg-9">
            <input type="file" class="form-control" @if ($married->status > 2) disabled @endif
                id="akta_husband" name="akta_husband">
            <label class="" for="akta_husband">
                @if ($documentmarried?->akta_husband != null)
                    <a href="{{ Helper::setUrlDocument($documentmarried->akta_husband) }}" target="blank">Lihat
                        Dokumen</a>
                @endif
            </label>
        </div>
    </div>
    <div class="form-group row">
        <label for="ijazah_husband" class="col-sm-4 col-lg-3 col-form-label">Ijazah
            *</label>
        <div class="col-sm-8 col-lg-9">
            <input type="file" class="form-control" @if ($married->status > 2) disabled @endif
                id="ijazah_husband" name="ijazah_husband">
            <label class="" for="ijazah_husband">
                @if ($documentmarried?->ijazah_husband != null)
                    <a href="{{ Helper::setUrlDocument($documentmarried->ijazah_husband) }}" target="blank">Lihat
                        Dokumen</a>
                @endif
            </label>
        </div>
    </div>
    <div class="form-group row mb-0">
        <label for="photo_husband" class="col-sm-4 col-lg-3 col-form-label">Photo
            (Latar Biru) *</label>
        <div class="col-sm-8 col-lg-9">
            <input type="file" class="form-control" @if ($married->status > 2) disabled @endif
                id="photo_husband" name="photo_husband">
            <label class="" for="photo_husband">
                @if ($documentmarried?->photo_husband != null)
                    <a href="{{ Helper::setUrlDocument($documentmarried->photo_husband) }}" target="blank">Lihat
                        Dokumen</a>
                @endif
            </label>
        </div>
    </div>
    <h6>* Semua berkas dibawa ke KUA ketika pelaksanaan Pra Nikah</h6>
</div>
