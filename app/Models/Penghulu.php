<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Penghulu
 *
 * @property int $id
 * @property int $married_id
 * @property string $name_penghulu
 * @property string $phone
 * @property string $address
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Married $married
 *
 * @package App\Models
 */
class Penghulu extends Model
{
    protected $table = 'penghulu';

    protected $casts = [
        'married_id' => 'int'
    ];

    protected $fillable = [
        'name_penghulu',
        'phone',
        'address',
        'photo'
    ];

    public function married()
    {
        return $this->belongsTo(Married::class);
    }
}
