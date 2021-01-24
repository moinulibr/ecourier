<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('merchant_id');
            $table->string('company_name',150)->nullable();
            $table->string('company_phone',15)->nullable();

            $table->tinyInteger('delivery_charge_activate')->default(0);
            $table->decimal('delivery_charge_same_city', 20, 2)->default(00.00);
            $table->decimal('delivery_charge_out_of_city', 20, 2)->default(00.00);
            $table->decimal('delivery_charge_other_city', 20, 2)->default(00.00);

            $table->tinyInteger('return_charge_activate')->default(0);
            $table->decimal('return_charge_same_city', 20, 2)->default(00.00);
            $table->decimal('return_charge_out_of_city', 20, 2)->default(00.00);
            $table->decimal('return_charge_other_city', 20, 2)->default(00.00);
            $table->tinyInteger('cod_charge_activate')->default(0); //1,0
            $table->enum('cod_charge_type', array('percent', 'fixed'))->default('percent');
            $table->decimal('cod_charge_same_city', 20, 2)->default(00.00);
            $table->decimal('cod_charge_out_of_city', 20, 2)->default(00.00);
            $table->decimal('cod_charge_other_city', 20, 2)->default(00.00);
            $table->decimal('others_charge', 20, 2)->default(00.00);
            $table->decimal('rca_order_return_parcent', 20, 2)->default(00.00);
            $table->tinyInteger('delivery_otp_activate')->default(0);
            $table->tinyInteger('prepaid_delivery_otp')->default(0);
            $table->tinyInteger('cash_on_delivery_otp')->default(0);
            $table->tinyInteger('payment_receive_confirmation')->default(0);
            $table->integer('payment_method_id')->nullable();
            $table->integer('bank_account_id')->nullable();
            //$table->integer('mbankingnumber')->nullable();
            //$table->string('bankname')->nullable();
            //$table->string('bankbrunch')->nullable();
            //$table->string('accountname')->nullable();
            //$table->string('accountnumber')->nullable();
            //$table->string('account_type')->nullable();

            $table->string('fb_fan_page',250)->nullable();
            $table->string('website',250)->nullable();
            $table->string('company_logo',150)->nullable();
            $table->text('address')->nullable();
            $table->integer('area_id')->nullable();
            $table->integer('city_id')->nullable();//district_id
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('is_verified')->default(1);
            $table->dateTime('deleted_at')->nullable();
            $table->integer('branch_id')->nullable();
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
        Schema::dropIfExists('merchant_settings');
    }
}
