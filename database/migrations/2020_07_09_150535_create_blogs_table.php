<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');

            $table->text('title');
            $table->mediumText('body');
            $table->text('photo')->nullable();
            $table->enum('status',['ACTIVE', 'DESACTIVE'])->default('ACTIVE');
            $table->integer('view')->default('0');;
            $table->integer('like')->default('0');
            $table->string('slug', 150)->unique();

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
        Schema::dropIfExists('blogs');
    }
}
