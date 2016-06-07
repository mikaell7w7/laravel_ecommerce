<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('category_id')->unsigned()->default(1);  // cria o campo category_id
            $table->foreign('category_id')->references('id')->on('categories'); //referencia a chave estrangeira no ID da tabela CATEGORIES
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //Quando houver um roolback, apenas a coluna será removida
            $table->removeColumn('category_id');
        });
    }
}
