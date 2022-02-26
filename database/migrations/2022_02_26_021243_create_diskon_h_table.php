<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiskonHTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diskon_h', function (Blueprint $table) {
            $table->increments('nosurat')->unsigned();
            $table->integer('kdoutlet')->unsigned()->nullable();
            $table->foreign('kdoutlet', 'foreign_outlet')
            ->references('kdoutlet')
            ->on('outlet')
            ->onDelete('cascade');
            $table->date('awal');
            $table->date('akhir');
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
        Schema::dropIfExists('diskon_h');
    }
}
