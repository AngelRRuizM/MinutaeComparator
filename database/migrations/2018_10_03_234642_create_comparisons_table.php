<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComparisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comparisons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('template');
            $table->string('image');
            $table->enum('hand', ['derecha', 'izquierda']);
            $table->enum('region', ['pulgar', 'índice', 'corazón', 'anular', 'meñique', 'palma']);
            $table->boolean('match');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('comparisons');
    }
}
