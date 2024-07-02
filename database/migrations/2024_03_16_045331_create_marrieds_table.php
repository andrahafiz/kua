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
        Schema::create('marrieds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id');
            $table->string('akta_nikah_number')->nullable()->unique();
            $table->smallInteger('counter')->default(0);
            $table->string('registration_number');
            $table->string('location_name')->nullable();
            $table->dateTime('akad_date_masehi')->nullable();
            $table->string('akad_location')->nullable();
            $table->string('desa_location')->nullable();
            $table->enum('married_on', ['DI KUA', 'DI LUAR KUA'])->nullable();
            $table->string('kua')->nullable();

            $table->enum('citizen_wife', ['WNI', 'WNA'])->nullable();
            $table->string('nationality_wife')->nullable();
            $table->string('no_passport_wife')->nullable();
            $table->string('nik_wife')->nullable();
            $table->string('name_wife')->nullable();
            $table->string('location_birth_wife')->nullable();
            $table->date('date_birth_wife')->nullable();
            $table->integer('old_wife')->nullable();
            $table->string('status_wife')->nullable();
            $table->string('religion_wife')->nullable();
            $table->string('education_wife')->nullable();
            $table->string('job_wife')->nullable();
            $table->string('phone_number_wife')->nullable();
            $table->string('email_wife')->nullable();
            $table->text('address_wife')->nullable(); // Changed to text
            $table->string('photo_wife')->nullable();
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

            $table->enum('citizen_husband', ['WNI', 'WNA'])->nullable();
            $table->string('nationality_husband')->nullable();
            $table->string('no_passport_husband')->nullable();
            $table->string('nik_husband')->nullable();
            $table->string('name_husband')->nullable();
            $table->string('location_birth_husband')->nullable();
            $table->date('date_birth_husband')->nullable();
            $table->integer('old_husband')->nullable();
            $table->string('status_husband')->nullable();
            $table->string('religion_husband')->nullable();
            $table->string('education_husband')->nullable();
            $table->string('job_husband')->nullable();
            $table->string('phone_number_husband')->nullable();
            $table->string('email_husband')->nullable();
            $table->text('address_husband')->nullable(); // Changed to text
            $table->string('photo_husband')->nullable();

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

            $table->smallInteger('status_payment')->nullable();
            $table->smallInteger('status')->default(0)->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('users_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('marrieds');
    }
};
