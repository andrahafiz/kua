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
 * @property string|null $N1_wife
 * @property string|null $N1_husband
 * @property string|null $N4_wife
 * @property string|null $N4_husband
 * @property string|null $N2_wife
 * @property string|null $N2_husband
 * @property string|null $N5_wife
 * @property string|null $N5_husband
 * @property string|null $surat_dispensasi_wife
 * @property string|null $surat_dispensasi_husband
 * @property string|null $akta_cerai_wife
 * @property string|null $akta_cerai_husband
 * @property string|null $akta_kematian_wife
 * @property string|null $akta_kematian_husband
 * @property string|null $surat_izin_komandan_wife
 * @property string|null $surat_izin_komandan_husband
 * @property string|null $rekomendasi_kua_wife
 * @property string|null $rekomendasi_kua_husband
 * @property string|null $surat_kedutaan_wife
 * @property string|null $surat_kedutaan_husband
 * @property string|null $ktp_wife
 * @property string|null $ktp_husband
 * @property string|null $kk_wife
 * @property string|null $kk_husband
 * @property string|null $akta_wife
 * @property string|null $akta_husband
 * @property string|null $ijazah_wife
 * @property string|null $ijazah_husband
 * @property string|null $surat_keterangan_wali_nikah_wife
 * @property string|null $surat_keterangan_wali_nikah_husband
 * @property string|null $photo_wife
 * @property string|null $photo_husband
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
        'N1_wife',
        'N1_husband',
        'N4_wife',
        'N4_husband',
        'N2_wife',
        'N2_husband',
        'N5_wife',
        'N5_husband',
        'surat_dispensasi_wife',
        'surat_dispensasi_husband',
        'akta_cerai_wife',
        'akta_cerai_husband',
        'akta_kematian_wife',
        'akta_kematian_husband',
        'surat_izin_komandan_wife',
        'surat_izin_komandan_husband',
        'rekomendasi_kua_wife',
        'rekomendasi_kua_husband',
        'surat_kedutaan_wife',
        'surat_kedutaan_husband',
        'ktp_wife',
        'ktp_husband',
        'kk_wife',
        'kk_husband',
        'akta_wife',
        'akta_husband',
        'ijazah_wife',
        'ijazah_husband',
        'surat_keterangan_wali_nikah_wife',
        'surat_keterangan_wali_nikah_husband',
        'photo_wife',
        'photo_husband'
    ];

    public function married()
    {
        return $this->belongsTo(Married::class);
    }
}
