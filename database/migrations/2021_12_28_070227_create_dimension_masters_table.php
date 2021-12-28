<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDimensionMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dimension_masters', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('acronym');
            $table->string('description');

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
        Schema::dropIfExists('dimension_masters');
    }
}
