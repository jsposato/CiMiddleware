<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexesToHooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('hooks', function($table)
        {
            $table->index('event_name');
            $table->index('hasRun');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('hooks', function($table)
        {
            $table->dropIndex('hooks_event_name_index');
            $table->dropIndex('hooks_hasrun_index');
        });
	}

}
