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
        Schema::create('perceraian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('married_id');
            $table->string('surat_putusan')->nullable();
            $table->string('surat_keterangan_hamil')->nullable();
            $table->string('berita_acara_mediasi')->nullable();
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
        Schema::dropIfExists('perceraian');
    }
};
