<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToItemsOutfitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('items_outfits', function(Blueprint $table)
		{
			$table->foreign('item_id', 'items_outfits_ibfk_1')->references('id')->on('items')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('outfit_id', 'items_outfits_ibfk_2')->references('id')->on('outfits')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('items_outfits', function(Blueprint $table)
		{
			$table->dropForeign('items_outfits_ibfk_1');
			$table->dropForeign('items_outfits_ibfk_2');
		});
	}

}
