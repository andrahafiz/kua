<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Husband
 *
 * @property int $id
 * @property int $married_id
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
 *
 * @property Married $married
 *
 * @package App\Models
 */
class Husband extends Model
{
    use HasFactory;
    protected $table = 'husbands';
    public $timestamps = false;

    protected $casts = [
        'married_id' => 'int',
        'date_birth_husband' => 'datetime',
        'old_husband' => 'int',
        'is_unknown_father_husband' => 'bool',
        'date_birth_father_husband' => 'datetime',
        'is_unknown_mother_husband' => 'bool',
        'date_birth_mother_husband' => 'datetime'
    ];

    protected $fillable = [
        'married_id',
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
        'address_mother_husband'
    ];

    protected function getDateBirthAttribute()
    {
        return $this->location_birth_husband . ', ' . $this->date_birth_husband?->isoFormat('D MMMM Y');
    }


    public function married()
    {
        return $this->belongsTo(Married::class);
    }
}
