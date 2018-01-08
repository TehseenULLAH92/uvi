<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('visited_user_id')->unsigned()->nullable();
            $table->integer('logedin_user_id')->unsigned()->nullable();
            $table->integer('company_id')->unsigned()->nullable();
            $table->date('vieweddate');
            $table->timestamps();
        });
        Schema::table('logs', function($table) {
          $table->foreign('visited_user_id')->references('id')->on('users');
          $table->foreign('logedin_user_id')->references('id')->on('users');
          $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
        Schema::enableForeignKeyConstraints();
    }
}
