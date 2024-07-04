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
        Schema::create('wives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('married_id')->constrained()->restrictOnUpdate()->restrictOnDelete();

            $table->enum('citizen_wife', ['WNI', 'WNA'])->nullable();
            $table->string('nationality_wife')->nullable();
            $table->string('no_passport_wife')->nullable();
            $table->string('nik_wife')->nullable();
            $table->string('name_wife')->nullable();
            $table->string('location_birth_wife')->nullable();
            $table->date('date_birth_wife')->nullable();
            $table->smallInteger('old_wife')->nullable();
            $table->string('status_wife')->nullable();
            $table->string('religion_wife')->nullable();
            $table->string('education_wife')->nullable();
            $table->string('job_wife')->nullable();
            $table->string('phone_number_wife')->nullable();
            $table->string('email_wife')->nullable();
            $table->text('address_wife')->nullable(); // Changed to text

            $table->string('nik_father_wife')->nullable();
            $table->boolean('is_unknown_father_wife')->nullable();
            $table->enum('citizen_father_wife', ['WNI', 'WNA'])->nullable();
            $table->string('nationality_father_wife')->nullable();
            $table->string('no_passport_father_wife')->nullable();
            $table->string('name_father_wife')->nullable();
            $table->string('location_birth_father_wife')->nullable();
            $table->date('date_birth_father_wife')->nullable();
            $table->string('religion_father_wife')->nullable();
            $table->string('job_father_wife')->nullable();
            $table->text('address_father_wife')->nullable(); // Changed to text

            $table->string('nik_mother_wife')->nullable();
            $table->boolean('is_unknown_mother_wife')->nullable();
            $table->enum('citizen_mother_wife', ['WNI', 'WNA'])->nullable();
            $table->string('nationality_mother_wife')->nullable();
            $table->string('no_passport_mother_wife')->nullable();
            $table->string('name_mother_wife')->nullable();
            $table->string('location_birth_mother_wife')->nullable();
            $table->date('date_birth_mother_wife')->nullable();
            $table->string('religion_mother_wife')->nullable();
            $table->string('job_mother_wife')->nullable();
            $table->text('address_mother_wife')->nullable(); // Changed to text
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
