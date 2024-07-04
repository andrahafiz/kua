<select name="{{ $name }}" id="{{ $name }}" class="form-control @error($name) is-invalid @enderror"
    @if ($status > 2) disabled @endif>
    <option value="">Pilih Hubungan Wali</option>
    @foreach ($hubungawali as $status)
        <option value="{{ $status }}" {{ $selected == $status ? 'selected' : '' }}>
            {{ $status }}
        </option>
    @endforeach
</select>
@error($name)
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
