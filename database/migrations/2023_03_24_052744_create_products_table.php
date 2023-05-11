<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id()->unsigned()->autoIncrement();
            $table->string('name', 100);
            $table->bigInteger('id_category')->unsigned();
            $table->foreign('id_category')->references('id')->on('product_categories');
            $table->text('description');
            $table->text('stats')->nullable();
            $table->double('unit_price');
            $table->double('promotion_price');
            $table->string('image',200);
            $table->string('unit',200);
            $table->integer('quantity');
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
        Schema::dropIfExists('products');
    }
}
