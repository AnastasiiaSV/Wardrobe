<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOutfitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('outfits', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('name', 64);
			$table->timestamp('time_of_creation')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->bigInteger('creator_id')->unsigned()->index('creator_id');
			$table->text('declaration');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('outfits');
	}

}
