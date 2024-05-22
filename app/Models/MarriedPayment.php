<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MarriedPayment
 * 
 * @property int $id
 * @property int $married_id
 * @property string|null $payment_method
 * @property string|null $code_billing
 * @property string $proof_payment
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Married $married
 *
 * @package App\Models
 */
class MarriedPayment extends Model
{
	protected $table = 'married_payment';

	protected $casts = [
		'married_id' => 'int'
	];

	protected $fillable = [
		'married_id',
		'payment_method',
		'code_billing',
		'proof_payment'
	];

	public function married()
	{
		return $this->belongsTo(Married::class);
	}
}
