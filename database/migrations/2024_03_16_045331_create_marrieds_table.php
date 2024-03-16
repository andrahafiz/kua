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
            $table->string('registration_number');
            $table->string('location_name');
            $table->dateTime('akad_date_masehi');
            $table->dateTime('akad_date_hijriah');
            $table->string('akad_location');
            $table->string('nationality_wife');
            $table->string('nik_wife');
            $table->string('name_wife');
            $table->string('location_birth_wife');
            $table->date('date_birth_wife');
            $table->integer('old_wife');
            $table->string('status_wife');
            $table->string('religion_wife');
            $table->string('address_wife');
            $table->string('nationality_husband');
            $table->string('nik_husband');
            $table->string('name_husband');
            $table->string('location_birth_husband');
            $table->date('date_birth_husband');
            $table->integer('old_husband');;
            $table->string('status_husband');
            $table->string('religion_husband');
            $table->string('address_husband');
            $table->smallInteger('status_payment');
            $table->smallInteger('status');
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
        Schema::dropIfExists('married');
    }
};
