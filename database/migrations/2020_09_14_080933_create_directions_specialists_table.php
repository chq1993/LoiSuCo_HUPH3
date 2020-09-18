<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectionsSpecialistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directions_specialists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('direction_division_id')->unsigned();
            $table->foreign('direction_division_id')->references('id')->on('directions_divisions')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('specialist_id')->unsigned();
            $table->foreign('specialist_id')->references('id')->on('user')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('directions_specialists');
    }
}
