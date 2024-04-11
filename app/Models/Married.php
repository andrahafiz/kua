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
 * @property string $registration_number
 * @property string $location_name
 * @property Carbon $akad_date_masehi
 * @property Carbon $akad_date_hijriah
 * @property string $akad_location
 * @property string $nationality_wife
 * @property string $nik_wife
 * @property string $name_wife
 * @property string $location_birth_wife
 * @property Carbon $date_birth_wife
 * @property int $old_wife
 * @property string $status_wife
 * @property string $religion_wife
 * @property string $address_wife
 * @property string $nationality_husband
 * @property string $nik_husband
 * @property string $name_husband
 * @property string $location_birth_husband
 * @property Carbon $date_birth_husband
 * @property int $old_husband
 * @property string $status_husband
 * @property string $religion_husband
 * @property string $address_husband
 * @property int $status_payment
 * @property int $status
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property User $user
 * @property Collection|MarriedDocument[] $married_documents
 *
 * @package App\Models
 */
class Married extends Model
{
    use SoftDeletes;
    protected $table = 'marrieds';

    protected $casts = [
        'users_id' => 'int',
        'akad_date_masehi' => 'datetime',
        'akad_date_hijriah' => 'datetime',
        'date_birth_wife' => 'datetime',
        'old_wife' => 'int',
        'date_birth_husband' => 'datetime',
        'old_husband' => 'int',
        'status_payment' => 'int',
        'status' => 'int'
    ];

    protected $fillable = [
        'users_id',
        'registration_number',
        'location_name',
        'akad_date_masehi',
        'akad_date_hijriah',
        'akad_location',
        'nationality_wife',
        'nik_wife',
        'name_wife',
        'location_birth_wife',
        'date_birth_wife',
        'old_wife',
        'status_wife',
        'religion_wife',
        'address_wife',
        'nationality_husband',
        'nik_husband',
        'name_husband',
        'location_birth_husband',
        'date_birth_husband',
        'old_husband',
        'status_husband',
        'religion_husband',
        'address_husband',
        'status_payment',
        'status'
    ];

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
}
