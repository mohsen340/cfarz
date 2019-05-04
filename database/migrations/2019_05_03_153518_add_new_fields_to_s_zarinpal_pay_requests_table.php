<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFieldsToSZarinpalPayRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('s_zarinpal_pay_requests', function (Blueprint $table) {
            $table->integer('user_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->integer('price')->nullable();
            $table->string('phone')->nullable();
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('s_zarinpal_pay_requests', function (Blueprint $table) {
            //
        });
    }
}
