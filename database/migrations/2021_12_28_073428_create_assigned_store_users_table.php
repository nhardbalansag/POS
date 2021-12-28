<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignedStoreUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_store_users', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')
            ->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->integer('store_information_id')->unsigned();
            $table->foreign('store_information_id')
            ->references('id')->on('store_information')
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
        Schema::dropIfExists('assigned_store_users');
    }
}
