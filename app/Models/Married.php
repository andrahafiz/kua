<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Married
 *
 * @property int $id
 * @property int $users_id
 * @property string|null $akta_nikah_number
 * @property string|null $document_akta_nikah
 * @property int $counter
 * @property string $registration_number
 * @property string|null $location_name
 * @property Carbon|null $akad_date_masehi
 * @property string|null $akad_location
 * @property string|null $desa_location
 * @property string|null $married_on
 * @property string|null $kua
 * @property int|null $status_payment
 * @property int|null $status
 * @property int|null $status_married
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $pramarried_date
 * @property int|null $penghulu_id
 *
 * @property Penghulu|null $penghulu
 * @property User $user
 * @property Collection|Husband[] $husbands
 * @property Collection|MarriedDocument[] $married_documents
 * @property Collection|MarriedPayment[] $married_payments
 * @property Collection|Notification[] $notifications
 * @property Collection|Wali[] $walis
 * @property Collection|Wife[] $wives
 *
 * @package App\Models
 */
class Married extends Model
{
    use SoftDeletes, HasFactory;
    protected $table = 'marrieds';

    protected $casts = [
        'users_id' => 'int',
        'counter' => 'int',
        'akad_date_masehi' => 'datetime',
        'status_payment' => 'int',
        'status' => 'int',
        'pramarried_date' => 'datetime',
        'penghulu_id' => 'int'
    ];

    protected $fillable = [
        'users_id',
        'akta_nikah_number',
        'document_akta_nikah',
        'counter',
        'registration_number',
        'location_name',
        'akad_date_masehi',
        'akad_location',
        'desa_location',
        'married_on',
        'kua',
        'status_payment',
        'status',
        'status_married',
        'pramarried_date',
        'penghulu_id'
    ];



    public function husbands()
    {
        return $this->hasOne(Husband::class);
    }

    public function walis()
    {
        return $this->hasOne(Wali::class);
    }

    public function wives()
    {
        return $this->hasOne(Wife::class);
    }

    public function penghulu()
    {
        return $this->belongsTo(Penghulu::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function married_documents()
    {
        return $this->hasOne(MarriedDocument::class);
    }

    public function archive_documents()
    {
        return $this->hasMany(ArchiveDocument::class);
    }

    public function perceraian()
    {
        return $this->hasOne(Perceraian::class);
    }

    public function rujuk()
    {
        return $this->hasOne(Rujuk::class);
    }

    public function married_payment()
    {
        return $this->hasOne(MarriedPayment::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function getNomorAkadAttribute()
    {
        $lastCounter = $this->max('counter') ?? 0;
        $counter = $lastCounter + 1;
        $akad = 'AKAD';
        $tanggal = date('d');
        $tahun = date('Y');
        $bulanRomawi = self::convertToRoman(date('n'));

        return "$counter/$akad/$tanggal-$bulanRomawi/$tahun";
    }

    protected static function convertToRoman($month)
    {
        $romans = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
        return $romans[$month - 1];
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $year = date('Y');
            $romawiMonth = self::convertToRoman(date('n'));
            $latestCounter = Married::max('counter') + 1 ?? 1;

            if (isset($model->akta_nikah_number)) {
                $model->akta_nikah_number = str_pad($latestCounter, 5, "0", STR_PAD_LEFT) . '/AKAD/' . $romawiMonth . '/' . $year;
                $model->counter = $latestCounter;
                return;
            }

            $model->akta_nikah_number = str_pad($latestCounter, 5, "0", STR_PAD_LEFT) . '/AKAD/' . $romawiMonth . '/' . $year;
            $model->counter = $latestCounter;
        });
    }
}
