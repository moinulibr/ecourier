<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchPayToMerchantClientInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_pay_to_merchant_client_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('payment_invoice_no',50)->nullable();
            $table->integer('from_branch_id')->nullable();
            $table->decimal('payment_amount', 20, 2)->default(00.00);
            $table->integer('payment_method_id')->nullable();
            $table->integer('payment_status_id')->default(1);
            $table->integer('payment_by')->nullable();
            $table->dateTime('payment_at')->nullable();
            $table->integer('parcel_owner_type_id')->nullable();
            $table->integer('payment_received_by')->nullable();
            $table->dateTime('payment_received_at')->nullable();
            $table->text('payment_description')->nullable();
            $table->string('payment_note',150)->nullable();

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
        Schema::dropIfExists('branch_pay_to_merchant_client_invoices');
    }
}
