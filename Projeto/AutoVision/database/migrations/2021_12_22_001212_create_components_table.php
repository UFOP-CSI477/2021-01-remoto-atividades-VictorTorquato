<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('components', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_id');
            $table->string('nome');
            $table->string('label');
            $table->integer('km_rev')->nullable();
            $table->integer('km_prox_rev')->nullable();
            $table->date('data_rev')->nullable();
            $table->date('data_prox_rev')->nullable();

            $table->foreign('car_id')
                ->references('id')
                ->on('cars');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('components');
    }
}
