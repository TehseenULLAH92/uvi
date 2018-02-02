<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('reports', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('driver_id')->unsigned()->nullable();
        $table->integer('company_id')->unsigned()->nullable();
        $table->string('report_submitted_person');
        $table->string('title');
        $table->string('severity');
        $table->string('issue');
        $table->string('cost_involved');
        $table->string('heppens');
        $table->rememberToken();
        $table->timestamps();
      });
      Schema::table('reports', function($table) {
        $table->foreign('driver_id')->references('id')->on('drivers');
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
      Schema::dropIfExists('reports');
      Schema::enableForeignKeyConstraints();
    }
}
