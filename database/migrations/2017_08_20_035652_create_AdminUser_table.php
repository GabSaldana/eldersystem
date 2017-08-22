<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_user', function (Blueprint $table) {
          $table->integer('admin_id')->unsigned();
          $table->integer('user_id')->unsigned();
          $table->rememberToken();
          $table->softDeletes();
          $table->timestamps();

          $table->foreign('admin_id')
          ->references('id')
          ->on('admins')
          ->onDelete('cascade');

          $table->foreign('user_id')
          ->references('id')
          ->on('users')
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
        Schema::dropIfExists('adminsusers');
    }
}
