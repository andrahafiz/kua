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
 * @property string|null $location_name
 * @property Carbon|null $akad_date_masehi
 * @property Carbon|null $akad_date_hijriah
 * @property string|null $akad_location
 * @property string|null $nationality_wife
 * @property string|null $nik_wife
 * @property string|null $name_wife
 * @property string|null $location_birth_wife
 * @property Carbon|null $date_birth_wife
 * @property int|null $old_wife
 * @property string|null $status_wife
 * @property string|null $religion_wife
 * @property string|null $address_wife
 * @property string|null $nationality_husband
 * @property string|null $nik_husband
 * @property string|null $name_husband
 * @property string|null $location_birth_husband
 * @property Carbon|null $date_birth_husband
 * @property int|null $old_husband
 * @property string|null $status_husband
 * @property string|null $religion_husband
 * @property string|null $address_husband
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
        'akad_date_masehi' => 'datetime',
        'akad_date_hijriah' => 'datetime',
        'date_birth_wife' => 'datetime',
        'old_wife' => 'int',
        'date_birth_husband' => 'datetime',
        'old_husband' => 'int',
        'status_payment' => 'int',
        'status' => 'int',
        'pramarried_date' => 'datetime',
        'penghulu_id' => 'int'
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
}
