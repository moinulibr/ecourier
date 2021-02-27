<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_customers', function (Blueprint $table) {
            $table->id();
            $table->string('name',150);
            //$table->string('phone',15)->unique();
            $table->string('phone',15)->nullable();
            //$table->string('email')->unique()->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->integer('branch_id')->nullable();
            $table->text('address')->nullable();
            $table->integer('area_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('verified_by')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('is_verified')->default(1);
            $table->integer('business_type_id')->nullable();
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
        Schema::dropIfExists('general_customers');
    }
}
