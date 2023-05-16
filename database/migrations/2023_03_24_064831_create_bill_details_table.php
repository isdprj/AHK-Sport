<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_details', function (Blueprint $table) {
            $table->id()->unsigned()->autoIncrement();
            $table->bigInteger('id_bill')->unsigned();
            $table->foreign('id_bill')->references('id')->on('bills');
            $table->bigInteger('id_product')->unsigned();
            $table->foreign('id_product')->references('id')->on('products');
            $table->integer('quantity')->unsigned();
            $table->double('unit_price');
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
        Schema::dropIfExists('bill_details');
    }
}
