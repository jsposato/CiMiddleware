<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('projectName', 100);
            $table->string('configFileLocation');
            $table->string('ciHostIP');
            $table->string('ciUsername');
            $table->string('ciPassword');
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
        Schema::drop('projects');
	}

}
