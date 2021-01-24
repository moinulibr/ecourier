<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceChargeSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_charge_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('service_type_id')->nullable();
            $table->integer('weight_id')->nullable();
            $table->integer('service_city_type_id')->nullable();
            $table->decimal('charge', 20, 2)->default(60.00);
            $table->decimal('third_party_charge', 20, 2)->default(30.00);
            $table->decimal('return_charge', 20, 2)->default(00.00);
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
        Schema::dropIfExists('service_charge_settings');
    }
}
