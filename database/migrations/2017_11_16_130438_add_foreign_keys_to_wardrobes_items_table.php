<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToWardrobesItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('wardrobes_items', function(Blueprint $table)
		{
			$table->foreign('wardrobe_id', 'wardrobes_items_ibfk_1')->references('id')->on('wardrobe')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('item_id', 'wardrobes_items_ibfk_2')->references('id')->on('items')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('wardrobes_items', function(Blueprint $table)
		{
			$table->dropForeign('wardrobes_items_ibfk_1');
			$table->dropForeign('wardrobes_items_ibfk_2');
		});
	}

}
