<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_assigns', function (Blueprint $table) {
            $table->id();
            $table->integer('manpower_id')->nullable();
            $table->integer('order_id')->nullable();
            $table->integer('order_processing_type_id')->nullable();
            $table->integer('assigner_id')->nullable();
            $table->integer('order_assigning_status_id')->nullable();
            $table->tinyInteger('collection_status')->default(0);
            $table->integer('branch_id')->nullable();
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
        Schema::dropIfExists('order_assigns');
    }
}
