<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('user')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('division_id')->unsigned()->nullable();
            $table->foreign('division_id')->references('id')->on('divisions')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('position_id')->unsigned()->nullable();
            $table->foreign('position_id')->references('id')->on('positions')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('status')->default(true);
            $table->float('percentageOfRole');
            $table->date('start_time');
            $table->date('end_time')->nullable();
            $table->string('guard_name', 500)->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
