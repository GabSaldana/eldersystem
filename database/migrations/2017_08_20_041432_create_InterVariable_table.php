<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterVariableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inter_variable', function (Blueprint $table) {
          $table->rememberToken();
          $table->softDeletes();
          $table->timestamps();

          $table->integer('variable_id')->unsigned();
          $table->integer('inter_id')->unsigned();

          $table->foreign('variable_id')
          ->references('id')
          ->on('variables')
          ->onDelete('cascade');

          $table->foreign('inter_id')
          ->references('id')
          ->on('interfaces')
          ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inter_variable');
    }
}
