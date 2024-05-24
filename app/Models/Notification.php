<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Notification
 *
 * @property int $id
 * @property int $married_id
 * @property string $description
 * @property string $type
 * @property string $message
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Married $married
 *
 * @package App\Models
 */
class Notification extends Model
{
    protected $table = 'notification';

    protected $casts = [
        'married_id' => 'int'
    ];

    protected $fillable = [
        'married_id',
        'description',
        'type',
        'message',
        'is_read',
    ];

    public function married()
    {
        return $this->belongsTo(Married::class);
    }
}
