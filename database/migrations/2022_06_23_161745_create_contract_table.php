<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract', function (Blueprint $table) {
            $table->id('item_id');
            $table->integer('contract_id');
            $table->integer('vendor_id');
            $table->string('vendor_name');
            $table->string('manager_id');
            $table->string('manager_name');
            $table->integer('cart_id');
            $table->string('med_name');
            $table->integer('quantity');
            $table->integer('total_price');
            $table->dateTime('accepted_time');
            $table->dateTime('delivery_time');
            $table->string('contract_status')->defalut('pending');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract');
    }
};
