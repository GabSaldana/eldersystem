<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientVariableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_variable', function (Blueprint $table) {
          $table->rememberToken();
          $table->softDeletes();
          $table->timestamps();

          $table->integer('user_id')->unsigned();
          $table->integer('variable_id')->unsigned();

          $table->foreign('user_id')
          ->references('id')
          ->on('users')
          ->onDelete('cascade');

          $table->foreign('variable_id')
          ->references('id')
          ->on('variables')
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
        Schema::dropIfExists('patient_variable');
    }
}
