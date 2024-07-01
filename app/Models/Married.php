<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Married
 *
 * @property int $id
 * @property int $users_id
 * @property string|null $akta_nikah_number
 * @property int $counter
 * @property string $registration_number
 * @property string|null $location_name
 * @property Carbon|null $akad_date_masehi
 * @property string|null $akad_location
 * @property string|null $desa_location
 * @property string|null $married_on
 * @property string|null $kua
 * @property string|null $citizen_wife
 * @property string|null $nationality_wife
 * @property string|null $no_passport_wife
 * @property string|null $nik_wife
 * @property string|null $name_wife
 * @property string|null $location_birth_wife
 * @property Carbon|null $date_birth_wife
 * @property int|null $old_wife
 * @property string|null $status_wife
 * @property string|null $religion_wife
 * @property string|null $education_wife
 * @property string|null $job_wife
 * @property string|null $phone_number_wife
 * @property string|null $email_wife
 * @property string|null $address_wife
 * @property string|null $photo_wife
 * @property string|null $nik_father_wife
 * @property bool|null $is_unknown_father_wife
 * @property string|null $citizen_father_wife
 * @property string|null $nationality_father_wife
 * @property string|null $no_passport_father_wife
 * @property string|null $name_father_wife
 * @property string|null $location_birth_father_wife
 * @property Carbon|null $date_birth_father_wife
 * @property string|null $religion_father_wife
 * @property string|null $job_father_wife
 * @property string|null $address_father_wife
 * @property string|null $nik_mother_wife
 * @property bool|null $is_unknown_mother_wife
 * @property string|null $citizen_mother_wife
 * @property string|null $nationality_mother_wife
 * @property string|null $no_passport_mother_wife
 * @property string|null $name_mother_wife
 * @property string|null $location_birth_mother_wife
 * @property Carbon|null $date_birth_mother_wife
 * @property string|null $religion_mother_wife
 * @property string|null $job_mother_wife
 * @property string|null $address_mother_wife
 * @property string|null $citizen_husband
 * @property string|null $nationality_husband
 * @property string|null $no_passport_husband
 * @property string|null $nik_husband
 * @property string|null $name_husband
 * @property string|null $location_birth_husband
 * @property Carbon|null $date_birth_husband
 * @property int|null $old_husband
 * @property string|null $status_husband
 * @property string|null $religion_husband
 * @property string|null $education_husband
 * @property string|null $job_husband
 * @property string|null $phone_number_husband
 * @property string|null $email_husband
 * @property string|null $address_husband
 * @property string|null $photo_husband
 * @property string|null $nik_father_husband
 * @property bool|null $is_unknown_father_husband
 * @property string|null $citizen_father_husband
 * @property string|null $nationality_father_husband
 * @property string|null $no_passport_father_husband
 * @property string|null $name_father_husband
 * @property string|null $location_birth_father_husband
 * @property Carbon|null $date_birth_father_husband
 * @property string|null $religion_father_husband
 * @property string|null $job_father_husband
 * @property string|null $address_father_husband
 * @property string|null $nik_mother_husband
 * @property bool|null $is_unknown_mother_husband
 * @property string|null $citizen_mother_husband
 * @property string|null $nationality_mother_husband
 * @property string|null $no_passport_mother_husband
 * @property string|null $name_mother_husband
 * @property string|null $location_birth_mother_husband
 * @property Carbon|null $date_birth_mother_husband
 * @property string|null $religion_mother_husband
 * @property string|null $job_mother_husband
 * @property string|null $address_mother_husband
 * @property int|null $status_payment
 * @property int|null $status
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $pramarried_date
 * @property int|null $penghulu_id
 *
 * @property Penghulu|null $penghulu
 * @property User $user
 * @property Collection|MarriedDocument[] $married_documents
 * @property Collection|MarriedPayment[] $married_payments
 * @property Collection|Notification[] $notifications
 *
 * @package App\Models
 */
class Married extends Model
{
    use SoftDeletes;
    protected $table = 'marrieds';

    protected $casts = [
        'users_id' => 'int',
        'counter' => 'int',
        'akad_date_masehi' => 'datetime',
        'date_birth_wife' => 'datetime',
        'old_wife' => 'int',
        'is_unknown_father_wife' => 'bool',
        'date_birth_father_wife' => 'datetime',
        'is_unknown_mother_wife' => 'bool',
        'date_birth_mother_wife' => 'datetime',
        'date_birth_husband' => 'datetime',
        'old_husband' => 'int',
        'is_unknown_father_husband' => 'bool',
        'date_birth_father_husband' => 'datetime',
        'is_unknown_mother_husband' => 'bool',
        'date_birth_mother_husband' => 'datetime',
        'status_payment' => 'int',
        'status' => 'int',
        'pramarried_date' => 'datetime',
        'penghulu_id' => 'int'
    ];

    protected $fillable = [
        'users_id',
        'akta_nikah_number',
        'counter',
        'registration_number',
        'location_name',
        'akad_date_masehi',
        'akad_location',
        'desa_location',
        'married_on',
        'kua',
        'citizen_wife',
        'nationality_wife',
        'no_passport_wife',
        'nik_wife',
        'name_wife',
        'location_birth_wife',
        'date_birth_wife',
        'old_wife',
        'status_wife',
        'religion_wife',
        'education_wife',
        'job_wife',
        'phone_number_wife',
        'email_wife',
        'address_wife',
        'photo_wife',
        'nik_father_wife',
        'is_unknown_father_wife',
        'citizen_father_wife',
        'nationality_father_wife',
        'no_passport_father_wife',
        'name_father_wife',
        'location_birth_father_wife',
        'date_birth_father_wife',
        'religion_father_wife',
        'job_father_wife',
        'address_father_wife',
        'nik_mother_wife',
        'is_unknown_mother_wife',
        'citizen_mother_wife',
        'nationality_mother_wife',
        'no_passport_mother_wife',
        'name_mother_wife',
        'location_birth_mother_wife',
        'date_birth_mother_wife',
        'religion_mother_wife',
        'job_mother_wife',
        'address_mother_wife',
        'citizen_husband',
        'nationality_husband',
        'no_passport_husband',
        'nik_husband',
        'name_husband',
        'location_birth_husband',
        'date_birth_husband',
        'old_husband',
        'status_husband',
        'religion_husband',
        'education_husband',
        'job_husband',
        'phone_number_husband',
        'email_husband',
        'address_husband',
        'photo_husband',
        'nik_father_husband',
        'is_unknown_father_husband',
        'citizen_father_husband',
        'nationality_father_husband',
        'no_passport_father_husband',
        'name_father_husband',
        'location_birth_father_husband',
        'date_birth_father_husband',
        'religion_father_husband',
        'job_father_husband',
        'address_father_husband',
        'nik_mother_husband',
        'is_unknown_mother_husband',
        'citizen_mother_husband',
        'nationality_mother_husband',
        'no_passport_mother_husband',
        'name_mother_husband',
        'location_birth_mother_husband',
        'date_birth_mother_husband',
        'religion_mother_husband',
        'job_mother_husband',
        'address_mother_husband',
        'status_payment',
        'status',
        'pramarried_date',
        'penghulu_id'
    ];


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
