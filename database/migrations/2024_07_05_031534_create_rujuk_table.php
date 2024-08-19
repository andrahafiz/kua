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
        Schema::create('rujuk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('married_id');
            $table->string('ktp_husband')->nullable();
            $table->string('ktp_wife')->nullable();
            $table->string('akta_cerai')->nullable();
            $table->string('buku_nikah')->nullable();
            $table->dateTime('tanggal_verifikasi')->nullable();
            $table->string('berita_acara')->nullable();
            $table->string('reason_approval')->nullable();
            $table->smallInteger('status')->default(0);
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
        Schema::dropIfExists('rujuk');
    }
};
