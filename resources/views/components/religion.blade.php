<select name="{{ $name }}" id="{{ $name }}" class="form-control @error($name) is-invalid @enderror"
    @disabled($status > 2)>
    <option value="">Pilih Agama</option>
    @foreach ($religion as $status)
        <option value="{{ $status }}" {{ $selected == $status ? 'selected' : '' }}>
            {{ $status }}
        </option>
    @endforeach
</select>
@error($name)
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
