<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			Schema::create('users', function($table)
			 {
			$table->increments('id');
			$table->string('name', 128);
			$table->string('email');
			$table->string('password', 60);
			$table->timestamps();
			 });
			//- See more at: http://codebright.daylerees.com/migrations#sthash.3q6n8WWH.dpuf
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			Schema::drop('users');
		});
	}

}