<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpiBinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upi_bins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('aggregator');
            $table->string('type','50');
            $table->string('route_bin','50');
            $table->string('bin','50');
            $table->string('name','50');
            $table->date('assigned_date');
            $table->integer('bankid');
            $table->string('bankcode');
            $table->string('card_program');
            $table->string('account_program');
            $table->string('cbs_name');
            $table->string('binary_name');
            $table->string('card_type');
            $table->char('status','1')->default('P');
            $table->defaultinfos(); //for default blueprint infos
            $table->archivedInfos();
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
        Schema::dropIfExists('upi_bins');
    }
}
