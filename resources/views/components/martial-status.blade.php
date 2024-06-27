<select name="status_wife" id="status_wife" class="form-control" name="nationality_wife"
    @error('status_wife') is-invalid @enderror @if ($status > 2) disabled @endif>
    <option value="">Pilih Status Pernikahan {{ $selected }}</option>
    @foreach ($maritalStatuses as $status)
        <option value="{{ $status }}" {{ $selected == $status ? 'selected' : '' }}>
            {{ $status }}
        </option>
    @endforeach
    {{ $selected }}
</select>
@error('status_wife')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
