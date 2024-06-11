<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trafo_id');
            $table->foreign('trafo_id')->references('id')->on('trafo')->onDelete('cascade');

            $table->string('topic_name');
            // $table->float('arus');

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
        Schema::dropIfExists('arus');
    }
}
