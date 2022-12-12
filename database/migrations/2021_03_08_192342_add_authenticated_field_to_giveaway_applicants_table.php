<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAuthenticatedFieldToGiveawayApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('giveaway_applicants', function (Blueprint $table) {
            $table->boolean('authenticated')->after('city')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('giveaway_applicants', function (Blueprint $table) {
            $table->dropColumn('authenticated');
        });
    }
}
