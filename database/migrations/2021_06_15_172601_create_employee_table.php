<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('work_place_id');
            $table->string('name');
            $table->string('gender');
            $table->dateTime('birthday')->nullable();
            $table->string('nationality')->nullable();
            $table->string('nationalID')->nullable();
            $table->timestamp('entryDate')->default(now());
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('contractType')->nullable();
            $table->string('jobTitle')->nullable();
            $table->string('department')->nullable();
            $table->boolean('isChecked')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees');
    }
}
