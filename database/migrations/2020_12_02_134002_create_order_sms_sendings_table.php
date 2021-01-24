<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderSmsSendingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_sms_sendings', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->nullable();
            $table->string('sending_method',191)->nullable();
            $table->string('sending_method_parameter',191)->nullable();
            $table->string('sms_note',191)->nullable();
            $table->tinyInteger('sms_count')->default(1);
            $table->integer('branch_id')->nullable();
            $table->tinyInteger('sms_delivery_status')->default(0);
            $table->tinyInteger('sms_payment_status')->default(0);
            $table->integer('payment_received_by')->nullable();
            $table->integer('paid_by')->nullable();
            $table->text('sms_content')->nullable();
            $table->string('sms_lenght',5)->nullable();
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
        Schema::dropIfExists('order_sms_sendings');
    }
}
