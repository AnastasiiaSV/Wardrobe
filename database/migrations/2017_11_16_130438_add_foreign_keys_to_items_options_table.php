<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToItemsOptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('items_options', function(Blueprint $table)
		{
			$table->foreign('item_id', 'items_options_ibfk_1')->references('id')->on('items')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('option_id', 'items_options_ibfk_2')->references('id')->on('options')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('items_options', function(Blueprint $table)
		{
			$table->dropForeign('items_options_ibfk_1');
			$table->dropForeign('items_options_ibfk_2');
		});
	}

}
