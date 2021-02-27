<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiveAmountHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receive_amount_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->nullable();
            $table->integer('parcel_owner_type_id')->nullable();
            $table->integer('receive_amount_type_id')->nullable();
            $table->integer('received_by')->nullable();
            $table->decimal('amount', 20, 2)->nullable();
            $table->integer('received_from')->nullable();
            $table->integer('received_from_user_role_id')->nullable();
            $table->integer('creating_branch_id')->nullable();
            $table->integer('received_amount_branch_id')->nullable();
            $table->integer('creating_branch_type_id')->nullable();
            $table->integer('received_branch_type_id')->nullable();

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
        Schema::dropIfExists('receive_amount_histories');
    }
}
