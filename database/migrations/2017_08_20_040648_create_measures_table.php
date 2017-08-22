<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measures', function (Blueprint $table) {
          $table->increments('id');
          $table->string('value');
          $table->date('date');
          $table->time('time');
          $table->rememberToken();
          $table->softDeletes();
          $table->timestamps();

          $table->integer('variable_id')->unsigned();

          $table->foreign('variable_id')
          ->references('id')
          ->on('variables')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('measures');
    }
}
