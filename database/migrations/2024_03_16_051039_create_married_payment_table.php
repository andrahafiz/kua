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
        Schema::create('married_payment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('married_id');
            $table->string('payment_method')->nullable();
            $table->string('code_billing')->nullable();
            $table->string('proof_payment');
            $table->timestamps();

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
        Schema::dropIfExists('married_payment');
    }
};
