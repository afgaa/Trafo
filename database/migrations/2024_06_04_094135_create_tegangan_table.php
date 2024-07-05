<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeganganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tegangan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trafo_id');
            $table->foreign('trafo_id')->references('id')->on('trafo')->onDelete('cascade');
            
            $table->string('topic_name_r');
            $table->string('topic_name_s');
            $table->string('topic_name_t');
            // $table->float('arus');

            // $table->double('value_r')->nullable();
            // $table->double('value_s')->nullable();
            // $table->double('value_t')->nullable();
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
        Schema::dropIfExists('tegangan');
    }
}
