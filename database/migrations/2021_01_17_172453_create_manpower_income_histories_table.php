<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManpowerIncomeHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manpower_income_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->nullable();
            $table->integer('manpower_id')->nullable();
            $table->integer('order_processing_type_id')->nullable();
            $table->integer('received_by')->nullable();
            $table->decimal('amount', 20, 2)->nullable();
            $table->integer('received_from')->nullable();
            $table->integer('branch_id')->nullable();
            $table->tinyInteger('payment_status_id')->nullable();

            $table->integer('created_by')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('is_verified')->default(1);
            $table->dateTime('deleted_at')->nullable();
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
        Schema::dropIfExists('manpower_income_histories');
    }
}
