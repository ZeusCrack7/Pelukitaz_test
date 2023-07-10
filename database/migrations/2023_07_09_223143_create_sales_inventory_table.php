<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesInventoryTable extends Migration
{
    public function up()
    {
        Schema::create('sales_inventory', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->timestamp('time')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales_inventory');
    }
}
