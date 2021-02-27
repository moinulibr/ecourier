<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no')->nullable();
            $table->string('merchant_invoice',100)->nullable();
            //$table->string('barcode_no',10)->nullable();
            $table->integer('parcel_owner_type_id')->default(1);
            $table->integer('merchant_id')->nullable();
            $table->integer('general_customer_id')->nullable();
            $table->integer('merchant_shop_id')->nullable();
            $table->integer('creating_branch_id')->nullable();
            $table->integer('creating_branch_type_id')->nullable();
            $table->integer('creating_area_id')->nullable();

		    $table->integer('weight_id')->nullable();

            $table->decimal('collect_amount', 20, 2);

            $table->integer('delivery_charge_type_id')->default(2);
            $table->integer('parcel_amount_payment_type_id')->default(1);

            $table->integer('service_charge_setting_id')->nullable();
            $table->decimal('service_charge', 20, 2)->default(00.00);

            $table->decimal('cod_charge', 20, 2)->default(00.00);
            $table->decimal('others_charge', 20, 2)->default(00.00);
            $table->decimal('net_product_amount', 20, 2)->default(00.00);
            $table->decimal('net_amount', 20, 2)->default(00.00);

            $table->integer('parcel_category_id')->default(1)->nullable();
            $table->integer('service_type_id')->default(1)->nullable();
            $table->integer('parcel_type_id')->default(1)->nullable();

            $table->integer('customer_id')->nullable();

            $table->integer('destination_branch_id')->nullable();
            $table->integer('destination_city_id')->nullable();
            $table->integer('destination_area_id')->nullable();

            $table->integer('order_status_id')->default(1);

            $table->tinyInteger('partial')->default(0);
            $table->decimal('parcel_quantity', 20, 2)->default(1.00);

            $table->integer('business_type_id')->nullable();
            
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
        Schema::dropIfExists('orders');
    }
}
