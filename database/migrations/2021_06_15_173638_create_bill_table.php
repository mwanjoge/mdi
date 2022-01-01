<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('work_place_id');
            $table->string('control_number')->nullable();
            $table->string('ref_number');
            $table->decimal('amount',22,2)->default(0);
            $table->decimal('amountPaid',22,2)->default(0);
            $table->decimal('balance',22,2)->default(0);
            $table->boolean('isPaid');
            $table->timestamp('billable_date');
            $table->timestamp('paid_date')->nullable();
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
        Schema::drop("bills");
    }
}
