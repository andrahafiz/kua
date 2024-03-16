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
 * @property string $payment_method
 * @property string $code_billing
 * @property string $proof_payment
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class MarriedPayment extends Model
{
	protected $table = 'married_payment';

	protected $fillable = [
		'payment_method',
		'code_billing',
		'proof_payment'
	];
}
