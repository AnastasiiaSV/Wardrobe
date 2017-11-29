<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('email', 128);
			$table->string('password', 128);
			$table->string('name', 32);
			$table->string('surname', 64);
			$table->string('phone', 32);
			$table->date('date_of_birth');
			$table->timestamp('date_of_registration')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->bigInteger('country_id')->unsigned()->index('country_id');
			$table->bigInteger('city_id')->unsigned()->index('city_id');
			$table->boolean('is_block')->default(0);
			$table->boolean('is_admin')->default(0);
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
