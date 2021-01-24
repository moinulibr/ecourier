<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProcessingHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_processing_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('order_status_id');
            $table->integer('branch_id')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('status_changer_id')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('is_verified')->default(1);
            $table->dateTime('deleted_at')->nullable();
            $table->timestamps();
            //$table->tinyInteger('developer_status')->default(1);
            //$table->tinyInteger('merchant_status')->default(0);
            //$table->tinyInteger('customer_status')->default(0);
            //$table->tinyInteger('delivery_man_picker_status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_processing_histories');
    }
}
