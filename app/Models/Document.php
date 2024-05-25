<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Document
 * 
 * @property int $id
 * @property string|null $title
 * @property string|null $number_document
 * @property string|null $file
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Document extends Model
{
	use SoftDeletes;
	protected $table = 'document';

	protected $fillable = [
		'title',
		'number_document',
		'file'
	];
}
