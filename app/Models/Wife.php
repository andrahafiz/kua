<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Wife
 *
 * @property int $id
 * @property int $married_id
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
 *
 * @property Married $married
 *
 * @package App\Models
 */
class Wife extends Model
{
    use HasFactory;
    protected $table = 'wives';
    public $timestamps = false;

    protected $casts = [
        'married_id' => 'int',
        'date_birth_wife' => 'datetime',
        'old_wife' => 'int',
        'is_unknown_father_wife' => 'bool',
        'date_birth_father_wife' => 'datetime',
        'is_unknown_mother_wife' => 'bool',
        'date_birth_mother_wife' => 'datetime'
    ];

    protected $fillable = [
        'married_id',
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
        'address_mother_wife'
    ];

    public function married()
    {
        return $this->belongsTo(Married::class);
    }
}
