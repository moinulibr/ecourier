<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyProfitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_profits', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->nullable();
            $table->integer('branch_id')->nullable();
            $table->integer('branch_type_id')->nullable();
            $table->decimal('charge', 20, 2)->default(00.00);
            $table->decimal('provided_commission', 20, 2)->default(00.00);
            $table->decimal('transportation_cost', 20, 2)->default(00.00);
            $table->decimal('other_cost', 20, 2)->default(00.00);
            $table->decimal('total_cost', 20, 2)->default(00.00);
            $table->decimal('profit_amount', 20, 2)->default(00.00);
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
        Schema::dropIfExists('company_profits');
    }
}
