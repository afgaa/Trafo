<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeganganHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tegangan_histories', function (Blueprint $table) {
            $table->id();

            $table->string('trafo_name');

            $table->string('topic_name_r');
            $table->string('topic_name_s');
            $table->string('topic_name_t');

            $table->double('value_r');
            $table->double('value_s');
            $table->double('value_t');
        
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
        Schema::dropIfExists('tegangan_histories');
    }
}
