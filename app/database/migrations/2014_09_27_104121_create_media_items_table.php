<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMediaItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::dropIfExists('media_items');
		Schema::create('media_items', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('title')->index();
            $table->text('description')->nullable();
            $table->string('file_path');
            $table->string('preview_path');
            $table->integer('mediapartner_id')->index();
            $table->string('media_type');
            $table->integer('group_id')->nullable();
            $table->text('metadata')->nullable();
			$table->timestamps();
		});

        Schema::dropIfExists('media_item_groups');
        Schema::create('media_item_groups',function(Blueprint $table){
            $table->increments('id');
            $table->string('title')->index();
            $table->text('description')->nullable();
            $table->integer('mediapartner_id')->index();
            $table->string('media_type');
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
		Schema::drop('media_items');
        Schema::drop('media_item_groups');
	}

}
