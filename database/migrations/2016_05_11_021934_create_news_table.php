<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
           $table->string('name')->unique();
           $table->string('alias');

           $table->text('description');
           $table->text('content');
           $table->string('image');
           $table->integer('user_id')->unsigned();
           $table->foreign('user_id')->references('id')->on('users')
           ->onDelete('cascade');
           $table->integer('cate_id')->unsigned();
           $table->foreign('cate_id')->references('id')->on('catalogues')
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
        Schema::drop('news');
    }
}
