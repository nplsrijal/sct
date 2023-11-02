<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_updates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bin');
            $table->string('branch','5');
            $table->string('customer_name','50');
            $table->string('card_number','50');
            $table->string('old_account','50')->nullable();
            $table->string('new_account','50');
            $table->string('new_customer_code','50');
            $table->string('contact_number','50')->nullable();
            $table->char('isactivate','1')->default('N');
            $table->char('isupdatedetails','1')->default('N');
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
        Schema::dropIfExists('account_updates');
    }
}
