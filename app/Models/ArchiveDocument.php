<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ArchiveDocument
 * 
 * @property int $id
 * @property int $married_id
 * @property string $title_document
 * @property string|null $type_document
 * @property string|null $path_document
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Married $married
 *
 * @package App\Models
 */
class ArchiveDocument extends Model
{
	use SoftDeletes;
	protected $table = 'archive_document';

	protected $casts = [
		'married_id' => 'int'
	];

	protected $fillable = [
		'married_id',
		'title_document',
		'type_document',
		'path_document'
	];

	public function married()
	{
		return $this->belongsTo(Married::class);
	}
}
