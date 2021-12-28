<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisteredStoreProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registered_store_products', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('Product_category_id')->unsigned();
            $table->foreign('Product_category_id')
            ->references('id')->on('product_categories')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->integer('store_information_id')->unsigned();
            $table->foreign('store_information_id')
            ->references('id')->on('store_information')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->integer('Product_id')->unsigned();
            $table->foreign('Product_id')
            ->references('id')->on('products')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registered_store_products');
    }
}
