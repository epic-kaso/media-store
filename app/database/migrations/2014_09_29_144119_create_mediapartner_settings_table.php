<?php

	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;

	class CreateMediapartnerSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mediapartner_settings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('mediapartner_id');
			$table->string('business_background_color');
			$table->string('business_name');
			$table->string('business_tagline');
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
		Schema::drop('mediapartner_settings');
	}

}
