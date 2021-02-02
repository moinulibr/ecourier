<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayToBranchCommissionInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_to_branch_commission_invoices', function (Blueprint $table) {
            $table->id();

            $table->string('payment_invoice_no',50)->nullable();
            $table->integer('from_branch_id')->nullable();

            $table->integer('payment_method_id')->nullable();
            $table->integer('payment_status_id')->default(1);
            $table->integer('payment_by')->nullable();
            $table->dateTime('payment_at')->nullable();
            $table->integer('payment_received_by')->nullable();
            $table->integer('received_branch_id')->nullable();
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
        Schema::dropIfExists('pay_to_branch_commission_invoices');
    }
}
