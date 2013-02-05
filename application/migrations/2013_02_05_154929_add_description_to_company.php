<?php

class Add_Description_To_Company {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
  {
		Schema::table('companies', function($table) {
			$table->string('description');
		});
  }    

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
  {
		Schema::table('companies', function($table) {
			$table->drop_column('description');
		});
  }

}
