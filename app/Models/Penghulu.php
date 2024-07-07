<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Penghulu
 *
 * @property int $id
 * @property string $name_penghulu
 * @property string $phone
 * @property string $address
 * @property string $photo
 * @property string $photo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Married[] $marrieds
 *
 * @package App\Models
 */
class Penghulu extends Model
{
    protected $table = 'penghulu';

    protected $fillable = [
        'name_penghulu',
        'phone',
        'address',
        'status',
        'photo'
    ];

    public function marrieds()
    {
        return $this->hasMany(Married::class);
    }
}
