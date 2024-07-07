    <h6 class="text-center">Penetapan Penghulu</h6>
    <div class="mt-3">
        <form method="POST" action="{{ route('kakua.assign_penghulu', $married->id) }}">
            @csrf
            <div class="form-group">
                <select class="form-control select2" required name="penghulu">
                    <option value="">Pilih Nama Penghulu</option>
                    @foreach ($penghulu as $row)
                        <option value="{{ $row->id }}">{{ $row->name_penghulu }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Tanggal Pra Nikah</label>
                <input type="text" class="form-control datetimepicker" name="tgl_pranikah">
            </div>
            <div class="form-group">
                <small> * Penghulu yang di tampilkan hanya penghulu yang tersedia di tanggal pernikahan</small>
            </div>
            <button type="submit" class="btn btn-icon btn-block icon-left btn-success"><i class="fas fa-check"></i>
                Simpan
            </button>
        </form>
    </div>
