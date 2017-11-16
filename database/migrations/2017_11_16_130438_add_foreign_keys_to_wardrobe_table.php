<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToWardrobeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('wardrobe', function(Blueprint $table)
		{
			$table->foreign('creator_id', 'wardrobe_creator_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('wardrobe', function(Blueprint $table)
		{
			$table->dropForeign('wardrobe_creator_id');
		});
	}

}
