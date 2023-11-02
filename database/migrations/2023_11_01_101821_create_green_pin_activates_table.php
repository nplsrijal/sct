<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGreenPinActivatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('green_pin_activates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bin');
            $table->string('branch','5');
            $table->integer('card_number');
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
        Schema::dropIfExists('green_pin_activates');
    }
}
