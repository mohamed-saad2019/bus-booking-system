<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->time('take_off_time')->default('00:00');
            $table->string('expected_time')->nullable();
            $table->string('distance')->nullable();
            $table->unsignedBigInteger('from_gov');
            $table->unsignedBigInteger('to_gov');
            $table->unsignedBigInteger('bus_id');
            $table->tinyInteger('status')->default('0');
            $table->timestamps();
        });

        Schema::table('trips', function($table) {
            $table->foreign('from_gov')->references('id')->on('governorates')->onDelete('cascade');
            $table->foreign('to_gov')->references('id')->on('governorates')->onDelete('cascade');
            $table->foreign('bus_id')->references('id')->on('buses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
}
