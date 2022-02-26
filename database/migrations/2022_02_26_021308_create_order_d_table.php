<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_d', function (Blueprint $table) {
            $table->increments('noorderdt')->unsigned();
            $table->integer('noorder')->unsigned()->nullable();
            $table->foreign('noorder', 'foreign_order_h')
            ->references('noorder')
            ->on('order_h')
            ->onDelete('cascade');
            $table->integer('jumlah');
            $table->float('harga',18,2);
            $table->float('diskon',5,2);
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
        Schema::dropIfExists('order_d');
    }
}
