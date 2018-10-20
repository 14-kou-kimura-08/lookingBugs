<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('name');
            $table->integer('position_id')->unsigned();
            $table->integer('meeting_id')->unsigned();
            $table->boolean('admin');
            $table->timestamps();

            $table->foreign('position_id')
                    ->references('id')
                    ->on('positions');

            $table->foreign('meeting_id')
                    ->references('id')
                    ->on('meetings')
                    ->onDelete('cascade');
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
