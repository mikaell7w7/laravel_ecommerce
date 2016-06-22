<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */

	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('cnpjcpf')->unique();
			$table->string('inscricao');
			$table->string('end_rua');
			$table->string('end_bairro');
			$table->string('end_cidade');
			$table->string('end_uf');
			$table->string('end_cep');
			$table->string('end_telefone');
			$table->string('password', 60);
			$table->integer('is_admin')->default('0');
			$table->rememberToken();
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
		Schema::drop('users');
	}

}
