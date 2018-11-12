<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoincidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::disableForeignKeyConstraints();
        Schema::create('coincidents', function (Blueprint $table) {
            $table->increments('id');
            $table->double('percentage', 5, 3);
            $table->string('type');
            $table->integer('comparison_id')->unsigned();
            $table->foreign('comparison_id')->references('id')->on('comparisons')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coincidents');
    }
}
