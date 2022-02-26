<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiskonDTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diskon_d', function (Blueprint $table) {
            $table->integer('nosurat')->unsigned()->nullable();
            $table->foreign('nosurat', 'foreign_diskon_h')
            ->references('nosurat')
            ->on('diskon_h')
            ->onDelete('cascade');
            $table->float('diskon',5,2);
            $table->float('min',18,2);
            $table->float('max',18,2);
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
        Schema::dropIfExists('diskon_d');
    }
}
