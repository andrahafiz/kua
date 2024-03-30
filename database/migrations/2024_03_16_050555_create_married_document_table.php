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
            $table->string('N1');
            $table->string('N3');
            $table->string('N5')->nullable();
            $table->string('surat_izin_komandan')->nullable();
            $table->string('surat_akta_cerai')->nullable();
            $table->string('ktp_wife')->nullable();
            $table->string('ktp_husband');
            $table->string('kk_wife')->nullable();
            $table->string('kk_husband');
            $table->string('akta_wife')->nullable();
            $table->string('akta_husband');
            $table->string('ijazah_wife')->nullable();
            $table->string('ijazah_husband');
            $table->string('photo_wife')->nullable();
            $table->string('photo_husband');
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
