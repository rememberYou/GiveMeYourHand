<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortraitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portraits', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('picture')->nullable();
            $table->string('firstname', '35');
            $table->string('name', '70');
            $table->string('status', '70');
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('email');
            $table->text('content');
            $table->string('slug')->unique();
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
        Schema::dropIfExists('portraits');
    }
}
