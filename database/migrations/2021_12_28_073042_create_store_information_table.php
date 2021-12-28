<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_information', function (Blueprint $table) {
            $table->increments('id');

            $table->string('store_name');
            $table->string('description');

            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')
            ->references('id')->on('status_masters')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->integer('store_location_id')->unsigned();
            $table->foreign('store_location_id')
            ->references('id')->on('store_location_masters')
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
        Schema::dropIfExists('store_information');
    }
}
