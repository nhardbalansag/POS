<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_categories', function (Blueprint $table) {
            $table->increments('id');

            $table->string('transaction_category_title');
            $table->string('acronym');
            $table->string('description');
            $table->decimal('selling_price');

            $table->integer('Product_id')->unsigned();;
            $table->foreign('Product_id')
            ->references('id')->on('products')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->integer('business_category_id')->unsigned();
            $table->foreign('business_category_id')
            ->references('id')->on('busines_category_masters')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->integer('unit_id')->unsigned();
            $table->foreign('unit_id')
            ->references('id')->on('unit_masters')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->integer('status_id')->unsigned();
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
        Schema::dropIfExists('transaction_categories');
    }
}
