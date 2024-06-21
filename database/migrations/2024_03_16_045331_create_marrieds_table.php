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
            $table->integer('counter')->default(0);
            $table->string('registration_number');
            $table->string('location_name')->nullable();
            $table->dateTime('akad_date_masehi')->nullable();
            $table->dateTime('akad_date_hijriah')->nullable();
            $table->string('akad_location')->nullable();
            $table->string('nationality_wife')->nullable();
            $table->string('nik_wife')->nullable();
            $table->string('name_wife')->nullable();
            $table->string('location_birth_wife')->nullable();
            $table->date('date_birth_wife')->nullable();
            $table->integer('old_wife')->nullable();
            $table->string('status_wife')->nullable();
            $table->string('religion_wife')->nullable();
            $table->string('address_wife')->nullable();
            $table->string('nationality_husband')->nullable();
            $table->string('nik_husband')->nullable();
            $table->string('name_husband')->nullable();
            $table->string('location_birth_husband')->nullable();
            $table->date('date_birth_husband')->nullable();
            $table->integer('old_husband')->nullable();
            $table->string('status_husband')->nullable();
            $table->string('religion_husband')->nullable();
            $table->string('address_husband')->nullable();
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
        Schema::dropIfExists('married');
    }
};
