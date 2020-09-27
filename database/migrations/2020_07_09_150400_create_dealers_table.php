<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nameAgency');
            $table->string('address');
            $table->string('email');
            $table->integer('phone');
            $table->integer('phone1');
            $table->integer('phoneWsp');
            $table->string('web');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('logo');
            $table->longText('about');
            $table->string('nameResponsable');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('slug');

            $table->integer('user_id')->unsigned();

            $table->timestamps();

            //relaciones

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dealers');
    }
}
