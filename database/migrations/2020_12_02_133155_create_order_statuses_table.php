<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('order_status',100)->nullable();
            $table->string('bangla_status',250)->nullable();
            $table->string('active_status',15)->default('english');
            $table->string('developer_condition',100)->nullable();
            $table->string('description',200)->nullable();
            $table->tinyInteger('developer_status')->default(1);

            $table->string('order_status_for_admin',100)->nullable();
            $table->string('order_status_for_merchant',100)->nullable();
            $table->string('order_status_for_admin_bangla',250)->nullable();
            $table->string('order_status_for_merchant_bangla',250)->nullable();
            $table->string('order_status_for_customer',100)->nullable();
            $table->string('order_status_for_customer_bangla',250)->nullable();
            $table->string('order_status_for_delivery_man_picker',100)->nullable();
            $table->string('order_status_for_delivery_man_picker_bangla',250)->nullable();

            $table->integer('business_type_id')->nullable();

            $table->tinyInteger('admin_status')->default(0);
            $table->tinyInteger('merchant_status')->default(0);
            $table->tinyInteger('manpower_status')->default(0);
            $table->tinyInteger('customer_status')->default(0);
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
        Schema::dropIfExists('order_statuses');
    }
}
