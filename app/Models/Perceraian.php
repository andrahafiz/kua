<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Perceraian
 * 
 * @property int $id
 * @property int $married_id
 * @property string|null $surat_putusan
 * @property string|null $surat_keterangan_hamil
 * @property string|null $berita_acara_mediasi
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Married $married
 *
 * @package App\Models
 */
class Perceraian extends Model
{
	use SoftDeletes;
	protected $table = 'perceraian';

	protected $casts = [
		'married_id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'married_id',
		'surat_putusan',
		'surat_keterangan_hamil',
		'berita_acara_mediasi',
		'status'
	];

	public function married()
	{
		return $this->belongsTo(Married::class);
	}
}
