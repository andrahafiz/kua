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
        Schema::create('husbands', function (Blueprint $table) {
            $table->id();
            $table->foreignId('married_id')->constrained()->restrictOnUpdate()->restrictOnDelete();

            $table->enum('citizen_husband', ['WNI', 'WNA'])->nullable();
            $table->string('nationality_husband')->nullable();
            $table->string('no_passport_husband')->nullable();
            $table->string('nik_husband')->nullable();
            $table->string('name_husband')->nullable();
            $table->string('location_birth_husband')->nullable();
            $table->date('date_birth_husband')->nullable();
            $table->smallInteger('old_husband')->nullable();
            $table->string('status_husband')->nullable();
            $table->string('religion_husband')->nullable();
            $table->string('education_husband')->nullable();
            $table->string('job_husband')->nullable();
            $table->string('phone_number_husband')->nullable();
            $table->string('email_husband')->nullable();
            $table->text('address_husband')->nullable(); // Changed to text

            $table->string('nik_father_husband')->nullable();
            $table->boolean('is_unknown_father_husband')->nullable();
            $table->enum('citizen_father_husband', ['WNI', 'WNA'])->nullable();
            $table->string('nationality_father_husband')->nullable();
            $table->string('no_passport_father_husband')->nullable();
            $table->string('name_father_husband')->nullable();
            $table->string('location_birth_father_husband')->nullable();
            $table->date('date_birth_father_husband')->nullable();
            $table->string('religion_father_husband')->nullable();
            $table->string('job_father_husband')->nullable();
            $table->text('address_father_husband')->nullable(); // Changed to text

            $table->string('nik_mother_husband')->nullable();
            $table->boolean('is_unknown_mother_husband')->nullable();
            $table->enum('citizen_mother_husband', ['WNI', 'WNA'])->nullable();
            $table->string('nationality_mother_husband')->nullable();
            $table->string('no_passport_mother_husband')->nullable();
            $table->string('name_mother_husband')->nullable();
            $table->string('location_birth_mother_husband')->nullable();
            $table->date('date_birth_mother_husband')->nullable();
            $table->string('religion_mother_husband')->nullable();
            $table->string('job_mother_husband')->nullable();
            $table->text('address_mother_husband')->nullable(); // Changed to text
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
