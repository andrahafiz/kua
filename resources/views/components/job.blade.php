<select name="{{ $name }}" id="{{ $name }}" class="form-control @error($name) is-invalid @enderror"
    @disabled($status > 2)>
    <option value="">Pilih Pekerjaan</option>
    @foreach ($job as $status)
        <option value="{{ $status }}" {{ $selected == $status ? 'selected' : '' }}>
            {{ $status }}
        </option>
    @endforeach
</select>
@error($name)
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
