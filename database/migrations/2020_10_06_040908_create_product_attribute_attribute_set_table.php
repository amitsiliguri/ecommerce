<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributeAttributeSetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attribute_attribute_set', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_attribute_set_id');
            $table->foreignId('product_attribute_id');
            $table->timestamps();
        });

        Schema::table('product_attribute_attribute_set', function (Blueprint $table) {
            $table->foreign('product_attribute_set_id')->references('id')->on('product_attribute_sets')->constrained()->onDelete('cascade');
            $table->foreign('product_attribute_id')->references('id')->on('product_attributes')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attribute_attribute_set');
    }
}
