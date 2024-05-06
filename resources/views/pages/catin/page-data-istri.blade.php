 <div class="data-istri">
     <div class="form-group row">
         <label for="nationality_wife" class="col-sm-3 col-lg-2 col-form-label">Kewarganegaraan</label>
         <div class="col-sm-9 col-lg-10">
             <select class="form-control" @if ($married->status > 2) disabled @endif name="nationality_wife">
                 <option>Option 1</option>
                 <option value="IDN">Indonesia</option>
                 <option value="MLY">Malaysia</option>
             </select>
         </div>
     </div>
     <div class="form-group row">
         <label for="nik_wife" class="col-sm-3 col-lg-2 col-form-label">NIK</label>
         <div class="col-sm-9 col-lg-10">
             <input type="text" class="form-control" @if ($married->status > 2) disabled @endif id="nik_wife"
                 name="nik_wife" placeholder="NIK Istri"
                 value="{{ $married->nik_wife != null ? $married->nik_wife : old('nik_wife') }}">
         </div>
     </div>
     <div class="form-group row">
         <label for="name_wife" class="col-sm-3 col-lg-2 col-form-label">Nama</label>
         <div class="col-sm-9 col-lg-10">
             <input type="text" class="form-control" @if ($married->status > 2) disabled @endif id="name_wife"
                 name="name_wife" placeholder="Nama Istri"
                 value="{{ $married->akad_location != null ? $married->akad_location : old('name_wife') }}">
         </div>
     </div>
     <div class="form-group row">
         <label for="location_birth_wife" class="col-sm-3 col-lg-2 col-form-label">Tempat
             Lahir</label>
         <div class="col-sm-9 col-lg-10">
             <input type="text" class="form-control" @if ($married->status > 2) disabled @endif
                 id="location_birth_wife" name="location_birth_wife" placeholder="Tempat Lahir Istri"
                 value="{{ $married->location_birth_wife != null ? $married->location_birth_wife : old('location_birth_wife') }}">
         </div>
     </div>
     <div class="form-group row">
         <label for="date_birth_wife" class="col-sm-3 col-lg-2 col-form-label">Tanggal
             Lahir</label>
         <div class="col-sm-9 col-lg-10">
             <input type="date" class="form-control" @if ($married->status > 2) disabled @endif
                 name="date_birth_wife" id="date_birth_wife"
                 value="{{ $married->date_birth_wife != null ? $married->date_birth_wife->format('Y-m-d') : Carbon\Carbon::parse(old('date_birth_wife'))->format('Y-m-d') }}">
         </div>
     </div>
     <div class="form-group row">
         <label for="old_wife" class="col-sm-3 col-lg-2 col-form-label">Umur</label>
         <div class="col-sm-9 col-lg-10">
             <input type="number" class="form-control" @if ($married->status > 2) disabled @endif id="old_wife"
                 name="old_wife" placeholder="Umur Istri"
                 value="{{ $married->old_wife != null ? $married->old_wife : old('old_wife') }}">
         </div>
     </div>
     <div class="form-group row">
         <label for="status_wife" class="col-sm-3 col-lg-2 col-form-label">Status</label>
         <div class="col-sm-9 col-lg-10">
             <input type="text" class="form-control" @if ($married->status > 2) disabled @endif
                 id="status_wife" name="status_wife" placeholder="Status Istri"
                 value="{{ $married->status_wife != null ? $married->status_wife : old('status_wife') }}">
         </div>
     </div>
     <div class="form-group row">
         <label for="religion_wife" class="col-sm-3 col-lg-2 col-form-label">Agama</label>
         <div class="col-sm-9 col-lg-10">
             <input type="text" class="form-control" @if ($married->status > 2) disabled @endif
                 id="religion_wife" name="religion_wife" placeholder="Agama Istri"
                 value="{{ $married->religion_wife != null ? $married->religion_wife : old('religion_wife') }}">
         </div>
     </div>
     <div class="form-group row mb-0">
         <label for="address_wife" class="col-sm-3 col-lg-2 col-form-label">Alamat</label>
         <div class="col-sm-9 col-lg-10">
             <input type="text" class="form-control" @if ($married->status > 2) disabled @endif
                 id="address_wife" name="address_wife" placeholder="Alamat Istri"
                 value="{{ $married->address_wife != null ? $married->address_wife : old('address_wife') }}">
         </div>
     </div>
 </div>
