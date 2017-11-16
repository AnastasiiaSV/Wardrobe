<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsersGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users_groups', function(Blueprint $table)
		{
			$table->foreign('user_id', 'users_groups_ibfk_1')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('group_id', 'users_groups_ibfk_2')->references('id')->on('groups')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users_groups', function(Blueprint $table)
		{
			$table->dropForeign('users_groups_ibfk_1');
			$table->dropForeign('users_groups_ibfk_2');
		});
	}

}
