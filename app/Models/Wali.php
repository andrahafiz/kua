<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Wali
 *
 * @property int $id
 * @property int $married_id
 * @property string|null $nik_wali
 * @property string|null $status_wali
 * @property string|null $hubungan_wali
 * @property string|null $citizen_wali
 * @property string|null $nationality_wali
 * @property string|null $no_passport_wali
 * @property string|null $name_wali
 * @property string|null $name_father_wali
 * @property string|null $reason_wali
 * @property string|null $location_birth_wali
 * @property Carbon|null $date_birth_wali
 * @property int|null $old_wali
 * @property string|null $religion_wali
 * @property string|null $job_wali
 * @property string|null $number_phone_wali
 * @property string|null $address_wali
 *
 * @property Married $married
 *
 * @package App\Models
 */
class Wali extends Model
{
    use HasFactory;
    protected $table = 'walis';
    public $timestamps = false;

    protected $casts = [
        'married_id' => 'int',
        'date_birth_wali' => 'datetime',
        'old_wali' => 'int'
    ];

    protected $fillable = [
        'married_id',
        'nik_wali',
        'status_wali',
        'hubungan_wali',
        'citizen_wali',
        'nationality_wali',
        'no_passport_wali',
        'name_wali',
        'name_father_wali',
        'reason_wali',
        'location_birth_wali',
        'date_birth_wali',
        'old_wali',
        'religion_wali',
        'job_wali',
        'number_phone_wali',
        'address_wali'
    ];

    public function married()
    {
        return $this->belongsTo(Married::class);
    }
}
