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
        Schema::create('manager_stock', function (Blueprint $table) {
            $table->id('med_id');
            $table->string('med_name');
            $table->integer('Stock');
            $table->float('costprice_perUnit');
            $table->float('sellprice_perUnit')->nullable();
            $table->float('profit_perUnit')->nullable();
            $table->integer('contract_id');
            $table->date('expiryDate');
            $table->date('manufacturingDate');
            $table->integer('vendor_id');
            $table->string('vendor_name');
            $table->string('status')->default('NOT FOR SALE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manager_stock');
    }
};
