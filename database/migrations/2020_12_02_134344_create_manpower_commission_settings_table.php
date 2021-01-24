<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManpowerCommissionSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manpower_commission_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('manpower_id')->nullable();
            $table->integer('manpower_type_id')->nullable();
            $table->integer('branch_id')->nullable();
            $table->integer('branch_type_id')->nullable();
            $table->integer('pickup_commission_type_id')->default(1);
            $table->decimal('pickup_commission_amount', 20, 2)->default(00.00);
            $table->integer('delivery_commission_type_id')->default(1);
            $table->decimal('delivery_commission_amount', 20, 2)->default(00.00);
            $table->integer('return_commission_type_id')->default(1);
            $table->decimal('return_commission_amount_amount', 20, 2)->default(00.00);
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
        Schema::dropIfExists('manpower_commission_settings');
    }
}
