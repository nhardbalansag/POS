<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('middlename')->default("none");
            $table->date('birthday');
            $table->string('email')->unique();
            $table->string('contact_number');
            $table->string('username');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->integer('status_id')->unsigned();;
            $table->foreign('status_id')
            ->references('id')->on('status_masters')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->integer('role_id')->unsigned();;
            $table->foreign('role_id')
            ->references('id')->on('role_masters')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
