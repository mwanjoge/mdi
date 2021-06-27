<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorplaceCheckupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workplace_checkups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('work_place_id');
            $table->timestamp('checkup_at')->default(now());
            $table->timestamp('submited_at')->nullable();
            $table->integer('total_employee');
            $table->integer('total_checked')->default(0);
            $table->string('type');
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
        Schema::dropIfExists('workplace_checkups');
    }
}
