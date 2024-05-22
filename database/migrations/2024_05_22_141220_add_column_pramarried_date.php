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
        Schema::table('marrieds', function (Blueprint $table) {
            $table->timestamp('pramarried_date')->nullable();
            $table->foreignId('penghulu_id')->nullable();

            $table->foreign('penghulu_id')
                ->references('id')
                ->on('penghulu')
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
        Schema::table('marrieds', function (Blueprint $table) {
            $table->dropColumn('pramrried_date');
            $table->dropColumn('penghulu_id');
        });
    }
};
