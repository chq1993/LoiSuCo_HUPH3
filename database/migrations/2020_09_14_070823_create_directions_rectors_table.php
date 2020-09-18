<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectionsRectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directions_rectors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('error_id')->unsigned();
            $table->foreign('error_id')->references('id')->on('errors')->onUpdate('cascade')->onDelete('cascade');
            $table->string('rector',50);
            $table->string('note',1000);
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
        Schema::dropIfExists('directions_rectors');
    }
}
