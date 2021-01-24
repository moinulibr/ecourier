<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryMenTable extends Migration
{
    /** 
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_men', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('father_mobile');
            $table->string('email')->nullable();
            $table->string('mobile');
            $table->string('nidnumber')->nullable();
            $table->string('nidcardpage')->nullable();
            $table->string('fathernid')->nullable();
            $table->string('cvfile');
            $table->text('address');
            $table->integer('status')->default(1);
            $table->integer('business_type_id')->nullable();
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
        Schema::dropIfExists('delivery_men');
    }
}
