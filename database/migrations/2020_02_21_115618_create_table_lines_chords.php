<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableLinesChords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chord_line', function (Blueprint $table) {
            $table->integer('line_id');
            $table->integer('chord_id');
            $table->integer('at');

            $table->foreign('line_id')->references('id')->on('lines');
            $table->foreign('chord_id')->references('id')->on('chords');
            
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
        Schema::dropIfExists('chord_line');
    }
}
