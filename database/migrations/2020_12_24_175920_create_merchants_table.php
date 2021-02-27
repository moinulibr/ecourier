<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company_name');
            $table->string('email');
            $table->string('mobile');
            $table->string('password');
            $table->string('office_address');
            $table->string('pickupaddress');
            $table->string('division_id');
            $table->string('district_id');
            $table->string('area_id');
            $table->string('payment_type');
            $table->string('mbankingname')->nullable();
            $table->string('mbankingnumber')->nullable();
            $table->string('bankname')->nullable();
            $table->string('bankbrunch')->nullable();
            $table->string('accountname')->nullable();
            $table->string('accountnumber')->nullable();
            $table->string('account_type')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('merchants');
    }
}
