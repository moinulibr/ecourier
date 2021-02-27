<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_destinations', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->nullable();
            $table->integer('branch_id')->nullable();
            $table->integer('branch_type_id')->nullable();
            $table->integer('order_receiving_sending_status_id')->nullable();
            $table->decimal('charge', 20, 2)->default(00.00);
            $table->decimal('receiving_commision', 20, 2)->default(00.00);
            $table->decimal('sending_commission', 20, 2)->default(00.00);
            $table->integer('received_by')->nullable();
            $table->dateTime('received_at')->nullable();
            $table->integer('send_by')->nullable();
            $table->dateTime('send_at')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('is_verified')->default(1);
            $table->dateTime('deleted_at')->nullable();
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('order_destinations');
    }
}
