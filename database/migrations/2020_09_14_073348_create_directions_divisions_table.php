<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectionsDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directions_divisions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('direction_rector_id')->unsigned();
            $table->foreign('direction_rector_id')->references('id')->on('directions_rectors')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('division_id')->unsigned();
            $table->foreign('division_id')->references('id')->on('divisions')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('directions_divisions');
    }
}
