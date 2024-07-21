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
            $table->string('document_akta_nikah')->nullable();
            $table->smallInteger('counter')->default(0);
            $table->string('registration_number');
            $table->string('location_name')->nullable();
            $table->dateTime('akad_date_masehi')->nullable();
            $table->string('akad_location')->nullable();
            $table->string('desa_location')->nullable();
            $table->enum('married_on', ['DI KUA', 'DI LUAR KUA'])->nullable();
            $table->string('kua')->nullable();
            $table->text('mahar')->nullable();
            $table->text('reason_approval')->nullable();

            $table->smallInteger('status_payment')->nullable();
            $table->smallInteger('status')->default(0)->nullable();
            $table->string('status_married', 10)->nullable();
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
