<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesInventoryProductsTable extends Migration
{
    public function up()
    {
        Schema::create('sales_inventory_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sales_inventory_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('sales_inventory_id')->references('id')->on('sales_inventory')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales_inventory_products');
    }
}

