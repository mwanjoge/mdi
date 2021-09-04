<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckupReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkup_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('checkup_id');
            $table->foreignId('workplace_checkup_id');
            $table->foreignId('employee_id');
            $table->foreignId('category_id');
            $table->foreignId('disease_id');
            $table->boolean('hasIssue')->default(false);
            $table->string('results')->nullable();
            $table->string('descriptions')->nullable();
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
        Schema::dropIfExists('checkup_reports');
    }
}
