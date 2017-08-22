<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterfacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interfaces', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->integer('quantity');
          $table->rememberToken();
          $table->softDeletes();
          $table->timestamps();

          $table->integer('node_id')->unsigned();
          $table->foreign('node_id')
          ->references('id')
          ->on('nodes')
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
        Schema::dropIfExists('interfaces');
    }
}
