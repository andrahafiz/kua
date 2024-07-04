<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('married_document', function (Blueprint $table) {
            $table->id();
            $table->foreignId('married_id');
            $table->string('N1_wife')->nullable();
            $table->string('N1_husband')->nullable();
            $table->string('N4_wife')->nullable();
            $table->string('N4_husband')->nullable();
            $table->string('N2_wife')->nullable();
            $table->string('N2_husband')->nullable();
            $table->string('N5_wife')->nullable();
            $table->string('N5_husband')->nullable();
            $table->string('surat_dispensasi_wife')->nullable();
            $table->string('surat_dispensasi_husband')->nullable();
            $table->string('akta_cerai_wife')->nullable();
            $table->string('akta_cerai_husband')->nullable();
            $table->string('akta_kematian_wife')->nullable();
            $table->string('akta_kematian_husband')->nullable();
            $table->string('surat_izin_komandan_wife')->nullable();
            $table->string('surat_izin_komandan_husband')->nullable();
            $table->string('rekomendasi_kua_wife')->nullable();
            $table->string('rekomendasi_kua_husband')->nullable();
            $table->string('surat_kedutaan_wife')->nullable();
            $table->string('surat_kedutaan_husband')->nullable();

            $table->string('ktp_wife')->nullable();
            $table->string('ktp_husband')->nullable();
            $table->string('kk_wife')->nullable();
            $table->string('kk_husband')->nullable();
            $table->string('akta_wife')->nullable();
            $table->string('akta_husband')->nullable();
            $table->string('ijazah_wife')->nullable();
            $table->string('ijazah_husband')->nullable();
            $table->string('surat_keterangan_wali_nikah_wife')->nullable();
            $table->string('surat_keterangan_wali_nikah_husband')->nullable();
            $table->string('photo_wife')->nullable();
            $table->string('photo_husband')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('married_id')
                ->references('id')
                ->on('marrieds')
                ->restrictOnUpdate()
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('married_document');
    }
};
