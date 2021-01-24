<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderThirdPartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_third_parties', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->nullable();
            $table->integer('third_party_service_id')->nullable();
            $table->enum('cservice_charge_type', array('percent', 'fixed'))->default('fixed');
            $table->decimal('service_charge', 20, 2)->default(00.00);
            $table->string('serive_charge_payment_status')->nullable();
            $table->decimal('third_party_charge', 20, 2)->default(00.00);
            $table->string('third_party_charge_payment_status')->nullable();
            $table->integer('service_charge_received_by')->nullable();
            $table->integer('third_party_charge_received_by')->nullable();
            $table->integer('business_type_id')->nullable();
            $table->integer('branch_id')->nullable();
            $table->integer('branch_type_id')->nullable();
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
        Schema::dropIfExists('order_third_parties');
    }
}
