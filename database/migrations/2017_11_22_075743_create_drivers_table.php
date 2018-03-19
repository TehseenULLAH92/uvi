<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('fname');
            $table->string('lname');
            $table->string('license')->nullable();
            $table->string('submitted_by');
            $table->string('report_amount');
            // $table->string('email');
            // $table->string('phonenumber');
            // $table->string('address');
            // $table->string('joiningdate');
            $table->timestamps();
        });
        Schema::table('drivers', function($table) {
          $table->foreign('company_id')->references('id')->on('companies');
          $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drivers');
        Schema::enableForeignKeyConstraints();
    }
}
