<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImovelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imovels', function (Blueprint $table) {
            
            $table->increments('id');
            
            $table->integer('pessoa_id')->unsigned()->index()
                  ->foreign('pessoa_id')->references('id')
                  ->on('pessoas')->onDelete('cascade');

            $table->string('endereco',100);
            
            $table->string('numero',10);

            $table->string('complemento',10);

            $table->string('cep',10);

            $table->string('bairro',100);

            $table->string('cidade',100);

            $table->string('uf',2);

            $table->string('descricao',250);

            $table->string('desativado',1);

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
        Schema::dropIfExists('imovels');
    }
}
