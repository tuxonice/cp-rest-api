<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ctt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctt', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id'); //Primary
            $table->integer('location_id')->unsigned();
            $table->integer('municipality_id')->unsigned();
            $table->integer('district_id')->unsigned();
            $table->string('art_cod',128);
            $table->string('art_tipo',128);
            $table->string('pri_prep',128);
            $table->string('art_titulo',128);
            $table->string('seg_prep',128);
            $table->string('art_desig',128);
            $table->string('art_local',128);
            $table->string('troco',128);
            $table->string('porta',128);
            $table->string('cliente',128);
            $table->char('cp4',4); //Index
            $table->char('cp3',3); //Index
            $table->string('cpalf',128);
            $table->index('cp4');
            $table->index('cp3');
            $table->index('district_id');
            $table->index('municipality_id');
            $table->index('location_id');
            $table->decimal('latitude', 10, 6)->nullable();
            $table->decimal('longitude', 10, 6)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ctt');
    }
}
