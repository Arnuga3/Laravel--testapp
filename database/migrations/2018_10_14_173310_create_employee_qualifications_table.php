<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_qualifications', function (Blueprint $table) {
            $table->integer('employee_id')->unsigned();
            $table->integer('qualification_id')->unsigned();
            $table->dateTime('date_achieved');
            $table->string('grade');
            $table->timestamps();
            $table->primary(['employee_id', 'qualification_id']);
            $table->foreign('qualification_id')->references('id')->on('qualifications')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_qualifications');
    }
}
