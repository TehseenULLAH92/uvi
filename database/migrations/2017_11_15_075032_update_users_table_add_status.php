<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTableAddStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users', function (Blueprint $table) {
          $table->enum('role', ['admin', 'crcompanies', 'incompanies', 'cremployees'])->default('admin');
          $table->integer('company_id')->unsigned();
          $table->integer('user_id')->unsigned();
          //$table->foreign('company_id')->references('id')->on('companies');
          $table->string('firstname', 255);
          $table->string('lastname', 255);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users', function (Blueprint $table) {
          Schema::dropIfExists('users');
      });
    }
}
