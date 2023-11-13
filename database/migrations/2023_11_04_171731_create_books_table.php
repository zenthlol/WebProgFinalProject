<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            // atur atribut disini
            // syntaxnya:
            // $table->type('nama_attribut');
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->integer('year');
            $table->string('synopsis');
            $table->string('image');

            $table->unsignedBigInteger('publisher_id'); // ini buat FK dri soal, pake datatype unsignedbiginteger biasanya
            $table->foreign('publisher_id')->references('id')->on('publishers'); //tambahan utk fk
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
        Schema::dropIfExists('books');
    }
};
