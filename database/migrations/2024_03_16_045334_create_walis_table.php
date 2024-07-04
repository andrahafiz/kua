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
        Schema::create('walis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('married_id')->constrained()->restrictOnUpdate()->restrictOnDelete();

            $table->string('nik_wali')->nullable();
            $table->string('status_wali')->nullable();
            $table->string('hubungan_wali')->nullable();
            $table->enum('citizen_wali', ['WNI', 'WNA'])->nullable();
            $table->string('nationality_wali')->nullable();
            $table->string('no_passport_wali')->nullable();
            $table->string('name_wali')->nullable();
            $table->string('name_father_wali')->nullable();
            $table->string('reason_wali')->nullable();
            $table->string('location_birth_wali')->nullable();
            $table->date('date_birth_wali')->nullable();
            $table->smallInteger('old_wali')->nullable();
            $table->string('religion_wali')->nullable();
            $table->string('job_wali')->nullable();
            $table->string('number_phone_wali')->nullable();
            $table->text('address_wali')->nullable(); // Changed to text
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marrieds');
    }
};
