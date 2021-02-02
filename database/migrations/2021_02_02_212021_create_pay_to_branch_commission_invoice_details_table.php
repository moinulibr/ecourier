<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayToBranchCommissionInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_to_branch_commission_invoice_details', function (Blueprint $table) {
            $table->id();

            $table->integer('pay_to_branch_commission_invoice_id')->nullable();

            $table->integer('order_id')->nullable();
            $table->integer('branch_commission_type_id')->nullable();
            $table->integer('branch_commission_id')->nullable();
            $table->decimal('amount', 20, 2)->nullable();

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
        Schema::dropIfExists('pay_to_branch_commission_invoice_details');
    }
}
