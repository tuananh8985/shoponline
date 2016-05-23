<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('alias');
            $table->string('title');
            $table->string('hotline1');
            $table->string('hotline2');
            $table->string('facebook');
            $table->string('skype');
            $table->string('email');
            $table->text('slogan');
            $table->text('map');
            $table->text('contactinfo');
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
        Schema::drop('contacts');
    }
}
