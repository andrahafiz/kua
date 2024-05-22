<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MarriedDocument
 * 
 * @property int $id
 * @property int $married_id
 * @property string $N1
 * @property string $N3
 * @property string|null $N5
 * @property string|null $surat_izin_komandan
 * @property string|null $surat_akta_cerai
 * @property string|null $ktp_wife
 * @property string $ktp_husband
 * @property string|null $kk_wife
 * @property string $kk_husband
 * @property string|null $akta_wife
 * @property string $akta_husband
 * @property string|null $ijazah_wife
 * @property string $ijazah_husband
 * @property string|null $photo_wife
 * @property string $photo_husband
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Married $married
 *
 * @package App\Models
 */
class MarriedDocument extends Model
{
	use SoftDeletes;
	protected $table = 'married_document';

	protected $casts = [
		'married_id' => 'int'
	];

	protected $fillable = [
		'married_id',
		'N1',
		'N3',
		'N5',
		'surat_izin_komandan',
		'surat_akta_cerai',
		'ktp_wife',
		'ktp_husband',
		'kk_wife',
		'kk_husband',
		'akta_wife',
		'akta_husband',
		'ijazah_wife',
		'ijazah_husband',
		'photo_wife',
		'photo_husband'
	];

	public function married()
	{
		return $this->belongsTo(Married::class);
	}
}
