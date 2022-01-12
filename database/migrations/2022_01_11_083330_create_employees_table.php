<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('e_id')->unsigned();
            $table->string('e_first_name');
            $table->string('e_last_name');
            $table->string('e_phone');
            $table->string('e_email')->unique();
            $table->integer('c_id')->unsigned()->nullable();
            $table->foreign('c_id', 'foreign_company')
                ->references('c_id')
                ->on('companies')
                ->onDelete('cascade');
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
        Schema::dropIfExists('employees');
    }
}
