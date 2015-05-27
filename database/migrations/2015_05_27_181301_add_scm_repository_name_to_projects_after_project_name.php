<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddScmRepositoryNameToProjectsAfterProjectName extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('projects', function($table)
        {
            $table->string('scmRepositoryName')->after('projectName');
            $table->enum('scmHost', ['Github', 'Bitbucket'])->after('scmRepositoryName');
            $table->index('scmRepositoryName');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('projects', function($table)
        {
            $table->dropIndex('projects_scmRepositoryName_index');
            $table->dropColumn('scmRepositoryName');
            $table->dropColumn('scmHost');
        });
	}

}
