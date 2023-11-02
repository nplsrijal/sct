<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardStatusUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_status_updates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bin');
            $table->string('card_number','50');
            $table->string('request_type','50');
            $table->char('status','1')->default('P');
            $table->char('isbulk','1')->default('N');
            $table->text('remarks')->nullable();
            $table->integer('submitted_by');
            $table->time('submitted_date');
            $table->integer('processed_by')->nullable();
            $table->time('processed_date')->nullable();
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
        Schema::dropIfExists('card_status_updates');
    }
}
