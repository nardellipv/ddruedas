<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');

            $table->string('version');
            $table->integer('displacement');
            $table->year('year');
            $table->integer('mileage');
            $table->bigInteger('price');
            $table->enum('money', ['$', 'U$S']);
            $table->enum('condition', ['Nueva', 'Usada']);
            $table->enum('fuel', ['Nafta', 'Eléctrico', 'Otro']);
            $table->enum('typeEngine', ['2 Tiempos', '4 Tiempos']);
            $table->enum('barter', ['Si', 'No']);
            $table->enum('status', ['Activo', 'Pausado', 'Pendiente','Rechazado'])->default('Pendiente');
            $table->date('expire');
            $table->integer('visit')->default(0);
            $table->longText('comment')->nullable();

            $table->integer('user_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->integer('pattern_id')->unsigned();
            $table->integer('brand_id')->unsigned();
            $table->integer('province_id')->unsigned();
            $table->integer('region_id')->unsigned();

            $table->timestamps();

            //relaciones

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('type_id')->references('id')->on('types')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('pattern_id')->references('id')->on('patterns')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('brand_id')->references('id')->on('brands')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('province_id')->references('id')->on('provinces')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('region_id')->references('id')->on('regions')
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
        Schema::dropIfExists('items');
    }
}
