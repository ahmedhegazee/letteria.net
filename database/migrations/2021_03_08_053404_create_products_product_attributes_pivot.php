<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsProductAttributesPivot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_product_attributes_pivot', function (Blueprint $table) {
            $table->id();
            $table->foreignId("product_id")->references("id")
                ->on("products")->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId("product_attribute_id")->references("id")
                ->on("product_attributes")->cascadeOnDelete()
                ->cascadeOnUpdate();
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
        Schema::dropIfExists('products_product_attributes_pivot');
    }
}