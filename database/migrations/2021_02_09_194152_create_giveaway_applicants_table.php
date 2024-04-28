<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiveawayApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giveaway_applicants', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('giveaway_id');
            $table->string('store');
            $table->string('receipt_number');
            $table->string('receipt_image_path');
            $table->string('name');
            $table->bigInteger('age')->min(18);
            $table->string('email');
            $table->string('city');
            $table->boolean('accept_giveaway_rules');
            $table->boolean('accept_gdpr');
            $table->boolean('sign_up_for_newsletter');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('giveaway_applicants');
    }
}
