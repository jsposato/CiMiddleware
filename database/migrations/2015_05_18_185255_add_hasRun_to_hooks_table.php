<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHasRunToHooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('hooks', function($table)
        {
            $table->boolean('hasRun')->default(0)->after('payload');
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
            $table->dropColumn('hasRun');
        });
	}

}
