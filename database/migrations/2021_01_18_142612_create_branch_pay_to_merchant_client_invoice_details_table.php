<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchPayToMerchantClientInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_pay_to_merchant_client_invoice_details', function (Blueprint $table) {
            $table->id();
            $table->integer('branch_pay_to_merchant_client_invoice_id')->nullable();
            $table->integer('parcel_owner_type_id')->nullable();
            $table->integer('order_id')->nullable();
            
            $table->integer('receive_amount_history_id')->nullable();
            $table->integer('receive_amount_type_id')->nullable();

            $table->decimal('amount', 20, 2)->default(00.00);
            $table->decimal('service_charge', 20, 2)->default(00.00);
            $table->decimal('cod_charge', 20, 3)->default(00.00);
            $table->decimal('others_charge', 20, 2)->default(00.00);
            $table->decimal('total_charge', 20, 2)->default(00.00);
            $table->decimal('product_amount', 20, 2)->default(00.00);

            $table->integer('payment_method_id')->nullable();
            $table->integer('payment_status_id')->nullable();
            $table->integer('payment_by')->nullable();


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
        Schema::dropIfExists('branch_pay_to_merchant_client_invoice_details');
    }
}
