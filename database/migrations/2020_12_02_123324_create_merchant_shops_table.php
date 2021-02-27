<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_shops', function (Blueprint $table) {
            $table->id();
            $table->integer('merchant_id'); //user_id
            $table->tinyInteger('activate_status')->default(0);
            $table->string('shop_name',200);
            $table->text('shop_address')->nullable();
            $table->text('pickup_address')->nullable();
            $table->integer('area_id')->nullable();
            $table->integer('city_id')->nullable();//district_id
            $table->integer('pickup_area_id')->nullable();
            //$table->integer('pickup_zone_id')->nullable();
            $table->integer('pickup_city_id')->nullable();//district
            $table->string('pickup_phone',15)->nullable();
            $table->integer('branch_id')->nullable();

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
        Schema::dropIfExists('merchant_shops');
    }
}
