<div class="data-suami">
    <div class="form-group row">
        <label for="nationality_husband" class="col-sm-3 col-lg-2 col-form-label">Kewarganegaraan</label>
        <div class="col-sm-9 col-lg-10">
            <select class="form-control" @if ($married->status > 2) disabled @endif name="nationality_husband">
                <option>Option 1</option>
                <option value="IDN">Indonesia</option>
                <option value="MLY">Malaysia</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="nik_husband" class="col-sm-3 col-lg-2 col-form-label">NIK</label>
        <div class="col-sm-9 col-lg-10">
            <input type="text" class="form-control" @if ($married->status > 2) disabled @endif
                id="nik_husband" placeholder="NIK Suami" name="nik_husband"
                value="{{ $married->nik_husband != null ? $married->nik_husband : old('nik_husband') }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="name_husband" class="col-sm-3 col-lg-2 col-form-label">Nama</label>
        <div class="col-sm-9 col-lg-10">
            <input type="text" class="form-control" @if ($married->status > 2) disabled @endif
                id="name_husband" placeholder="Nama Suami" name="name_husband"
                value="{{ $married->name_husband != null ? $married->name_husband : old('name_husband') }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="location_birth_husband" class="col-sm-3 col-lg-2 col-form-label">Tempat
            Lahir</label>
        <div class="col-sm-9 col-lg-10">
            <input type="text" class="form-control" @if ($married->status > 2) disabled @endif
                id="location_birth_husband" name="location_birth_husband" placeholder="Tempat Lahir Suami"
                value="{{ $married->location_birth_husband != null ? $married->location_birth_husband : old('location_birth_husband') }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="date_birth_husband" class="col-sm-3 col-lg-2 col-form-label">Tanggal
            Lahir</label>
        <div class="col-sm-9 col-lg-10">
            <input type="date" class="form-control" @if ($married->status > 2) disabled @endif
                id="date_birth_husband" name="date_birth_husband"
                value="{{ $married->date_birth_husband != null ? $married->date_birth_husband->format('Y-m-d') : Carbon\Carbon::parse(old('date_birth_husband'))->format('Y-m-d') }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="old_husband" class="col-sm-3 col-lg-2 col-form-label">Umur</label>
        <div class="col-sm-9 col-lg-10">
            <input type="number" name="old_husband" class="form-control"
                @if ($married->status > 2) disabled @endif id="old_husband" placeholder="Umur Suami"
                value="{{ $married->old_husband != null ? $married->old_husband : old('old_husband') }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="status_husband" class="col-sm-3 col-lg-2 col-form-label">Status</label>
        <div class="col-sm-9 col-lg-10">
            {{-- <input type="text" class="form-control" @if ($married->status > 2) disabled @endif
                id="status_husband" placeholder="Status Suami" name="status_husband"
                value="{{ $married->status_husband != null ? $married->status_husband : old('status_husband') }}"> --}}
            <x-martial-status :selected="$married->status_husband != null ? $married->status_husband : old('status_husband')" :status="$married->status" />
        </div>
    </div>
    <div class="form-group row">
        <label for="religion_husband" class="col-sm-3 col-lg-2 col-form-label">Agama</label>
        <div class="col-sm-9 col-lg-10">
            {{-- <input type="text" class="form-control" @if ($married->status > 2) disabled @endif
                id="religion_husband" placeholder="Agama Suami" name="religion_husband"
                value="{{ $married->religion_husband != null ? $married->religion_husband : old('religion_husband') }}"> --}}
            <x-religion :selected="$married->religion_husband != null ? $married->religion_husband : old('religion_husband')" :status="$married->status" />
        </div>
    </div>
    <div class="form-group row mb-0">
        <label for="address_husband" class="col-sm-3 col-lg-2 col-form-label">Alamat</label>
        <div class="col-sm-9 col-lg-10">
            <input type="text" class="form-control" @if ($married->status > 2) disabled @endif
                id="address_husband" placeholder="Alamat Suami" name="address_husband"
                value="{{ $married->address_husband != null ? $married->address_husband : old('address_husband') }}">
        </div>
    </div>
</div>
