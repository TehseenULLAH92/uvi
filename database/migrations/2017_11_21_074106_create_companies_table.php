<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('license')->nullable();
            $table->string('phonenumber',255);
            $table->string('name',255);
            $table->string('email',255);
            $table->string('address',255);
            $table->string('website',255);
            $table->string('image',255);
            $table->string('personfname',255);
            $table->string('personlname',255);
            $table->string('personphone',255);
            $table->string('personemail',255);
            $table->string('membership',255);
            $table->date('startdate');
            $table->date('enddate');
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
        Schema::dropIfExists('companies');
    }
}
