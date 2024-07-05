<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Rujuk
 * 
 * @property int $id
 * @property int $married_id
 * @property string|null $ktp_husband
 * @property string|null $ktp_wife
 * @property string|null $akta_cerai
 * @property string|null $buku_nikah
 * @property Carbon|null $tanggal_verifikasi
 * @property string|null $berita_acara
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Married $married
 *
 * @package App\Models
 */
class Rujuk extends Model
{
	use SoftDeletes;
	protected $table = 'rujuk';

	protected $casts = [
		'married_id' => 'int',
		'tanggal_verifikasi' => 'datetime',
		'status' => 'int'
	];

	protected $fillable = [
		'married_id',
		'ktp_husband',
		'ktp_wife',
		'akta_cerai',
		'buku_nikah',
		'tanggal_verifikasi',
		'berita_acara',
		'status'
	];

	public function married()
	{
		return $this->belongsTo(Married::class);
	}
}
