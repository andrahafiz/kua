<div id="proof_payment" class="text-center">
    <h6>Verifikasi Pembayaran</h6>
    <a href="{{ Helper::setUrlImage($married?->married_payment?->proof_payment) }}" class="chocolat-image">
        <img alt="image" src="{{ Helper::setUrlImage($married?->married_payment?->proof_payment) }}"
            class="img-fluid img-thumbnail w-75">
    </a>
    <div class="mt-3">
        <form method="POST" action="{{ route('staff.verification-payment', $married->id) }}">
            @csrf
            @method('PUT')
            <button type="submit" name="type" value="tolak" class="btn btn-icon btn-lg icon-left btn-danger"><i
                    class="fas fa-times"></i> Tolak
            </button>
            <button type="submit" name="type" value="approve" class="btn btn-icon btn-lg icon-left btn-success"><i
                    class="fas fa-check"></i> Terima
            </button>
        </form>
    </div>
</div>
