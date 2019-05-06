<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewAppDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_app_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('google_play_link')->nullable();
            $table->string('is_google_play_download')->nullable();
            $table->string('bazar_link')->nullable();
            $table->string('is_bazar_download')->nullable();
            $table->string('direct_link')->nullable();
            $table->string('is_direct_download')->nullable();
            $table->string('auto_download')->nullable();
            $table->string('immediate_install')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('new_app_details');
    }
}
