<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('error_id')->unsigned();
            $table->foreign('error_id')->references('id')->on('errors')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('job_id_send')->unsigned();
            $table->foreign('job_id_send')->references('id')->on('jobs')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('job_id_received')->unsigned();
            $table->foreign('job_id_received')->references('id')->on('jobs')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('comments');
    }
}
