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
            $table->increments('id');

            $table->string('product_name');
            $table->string('product_code');
            $table->string('description');
            $table->decimal('total_cost_price');
            $table->decimal('quantity_in');
            $table->string('d_data');

            $table->integer('dimension_id')->unsigned();
            $table->foreign('dimension_id')
            ->references('id')->on('dimension_masters')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->integer('unit_id')->unsigned();;
            $table->foreign('unit_id')
            ->references('id')->on('unit_masters')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->integer('market_source_id')->unsigned();
            $table->foreign('market_source_id')
            ->references('id')->on('market_sources')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->integer('product_category_id')->unsigned();
            $table->foreign('product_category_id')
            ->references('id')->on('product_categories')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->integer('status_id')->unsigned();;
            $table->foreign('status_id')
            ->references('id')->on('status_masters')
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
        Schema::dropIfExists('products');
    }
}
