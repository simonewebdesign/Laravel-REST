<?php

class Create_Companies_Table {    

	public function up()
    {
		Schema::create('companies', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('telephone');
			$table->string('address');
			$table->string('email');
			$table->string('website');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('companies');

    }

}