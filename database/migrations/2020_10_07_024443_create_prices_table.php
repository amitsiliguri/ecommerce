<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->double('base_price', 8, 2);
            $table->double('special_price', 8, 2)->nullable();
            $table->date('offer_start')->nullable();
            $table->date('offer_end')->nullable();
            $table->foreignId('product_id');
            $table->timestamps();
        });
        Schema::table('prices', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prices');
    }
}
