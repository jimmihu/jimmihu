<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderHTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_h', function (Blueprint $table) {
            $table->increments('noorder')->unsigned();
            $table->date('tanggal');
            $table->integer('kdoutlet')->unsigned();
            $table->boolean('lunas');
            $table->float('totalbayar',18,2);
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
        Schema::dropIfExists('order_h');
    }
}
