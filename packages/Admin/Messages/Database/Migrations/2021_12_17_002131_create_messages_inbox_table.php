<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesInboxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages_inbox', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('msisdn', 100)->index()->nullable();
            $table->string('subject', 100)->nullable();
            $table->string('shortcode', 100)->nullable();
            $table->longText('message')->nullable();
            $table->string('replied',10)->index()->nullable();
//            $table->integer('question_id')->index()->nullable();

            $table->timestamps();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('messages_outbox');
    }
}
