<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BusChairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_chairs', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('bus_id');
            $table->tinyInteger('status')->default('0');
            $table->foreign('bus_id')->references('id')->on('buses')->onDelete('cascade'); 
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
        Schema::dropIfExists('bus_chairs');
    }
}
