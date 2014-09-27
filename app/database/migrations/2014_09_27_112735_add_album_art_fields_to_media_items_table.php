<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddAlbumArtFieldsToMediaItemsTable extends Migration {

	/**
	 * Make changes to the table.
	 *
	 * @return void
	 */
	public function up()
	{	
		Schema::table('media_items', function(Blueprint $table) {		
			
			$table->string('album_art_file_name')->nullable();
			$table->integer('album_art_file_size')->nullable();
			$table->string('album_art_content_type')->nullable();
			$table->timestamp('album_art_updated_at')->nullable();

		});

	}

	/**
	 * Revert the changes to the table.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('media_items', function(Blueprint $table) {

			$table->dropColumn('album_art_file_name');
			$table->dropColumn('album_art_file_size');
			$table->dropColumn('album_art_content_type');
			$table->dropColumn('album_art_updated_at');

		});
	}

}
