<?php

	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;

	class AddBusinessLogoFieldsToMediapartnerSettingsTable extends Migration {

	/**
	 * Make changes to the table.
	 *
	 * @return void
	 */
	public function up()
	{	
		Schema::table('mediapartner_settings', function(Blueprint $table) {		
			
			$table->string('business_logo_file_name')->nullable();
			$table->integer('business_logo_file_size')->nullable();
			$table->string('business_logo_content_type')->nullable();
			$table->timestamp('business_logo_updated_at')->nullable();

		});

	}

	/**
	 * Revert the changes to the table.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('mediapartner_settings', function(Blueprint $table) {

			$table->dropColumn('business_logo_file_name');
			$table->dropColumn('business_logo_file_size');
			$table->dropColumn('business_logo_content_type');
			$table->dropColumn('business_logo_updated_at');

		});
	}

}
