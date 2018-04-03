<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMmenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_menu', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name',100);
          $table->integer('price');
          $table->integer('type_id');
          $table->text('note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('m_menu');
    }
}
