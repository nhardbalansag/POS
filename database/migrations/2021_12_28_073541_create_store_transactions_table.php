<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_transactions', function (Blueprint $table) {
            $table->increments('id');

            $table->string('transaction_number');
            $table->integer('quantity_out');
            $table->string('customer_name');

            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')
            ->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->integer('transaction_category_id')->unsigned();
            $table->foreign('transaction_category_id')
            ->references('id')->on('transaction_categories')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->integer('business_category_id')->unsigned();
            $table->foreign('business_category_id')
            ->references('id')->on('busines_category_masters')
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
        Schema::dropIfExists('store_transactions');
    }
}
