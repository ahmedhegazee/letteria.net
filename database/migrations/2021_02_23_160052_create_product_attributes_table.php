<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId("product_id")->references("id")
                ->on("products")->cascadeOnUpdate()->cascadeOnDelete();
            $table->text("name");
            $table->enum("type", ["text", "dropdown", "radio"]);
            $table->float("price", 8, 2, true)->default(0.00);
            $table->unsignedSmallInteger("limit_chars")->default(0);
            $table->unsignedTinyInteger("required")->default(0);
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
        Schema::dropIfExists('product_attributes');
    }
}