<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchCommissionSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_commission_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('branch_id')->nullable();
            $table->integer('branch_type_id')->nullable();
            $table->integer('create_and_pick_commission_type_id')->default(1);
            $table->decimal('create_and_pick_commission_amount', 20, 2)->default(00.00);
            $table->integer('create_pick_and_delivery_commision_type_id')->default(1);
            $table->decimal('create_pick_and_delivery_commision_amount', 20, 2)->default(00.00);
            $table->integer('receive_and_delivery_commision_type_id')->default(1);
            $table->decimal('receive_and_delivery_commision_amount', 20, 2)->default(00.00);
            $table->integer('receive_as_media_commision_type_id')->default(1);
            $table->decimal('receive_as_media_commision_amount', 20, 2)->default(00.00);
            $table->integer('sending_as_media_commision_type_id')->default(1);
            $table->decimal('sending_as_media_commision_amount', 20, 2)->default(00.00);
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
        Schema::dropIfExists('branch_commission_settings');
    }
}
