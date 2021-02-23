<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('productid');
            $table->unsignedInteger('catid');
            $table->foreign('catid')->references('catid')->on('categories');
            $table->string('productname');
            $table->string('image');
            $table->longtext('detail');
            $table->unsignedinteger('price');
            $table->unsignedinteger('saleprice')->nullable();
            $table->unsignedinteger('views');
            $table->boolean('public');
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
