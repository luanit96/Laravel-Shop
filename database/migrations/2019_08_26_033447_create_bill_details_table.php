<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('bill_detailid');
            $table->unsignedInteger('billid');
            $table->foreign('billid')->references('billid')->on('bills');
            $table->unsignedInteger('productid');
            $table->foreign('productid')->references('productid')->on('products');
            $table->bigInteger('quantity');
            $table->unsignedinteger('price');
            $table->unsignedinteger('saleprice');
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
