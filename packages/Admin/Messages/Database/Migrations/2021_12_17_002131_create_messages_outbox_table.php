<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesOutboxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages_outbox', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('to_user', 100)->index()->nullable();
            $table->string('m_type', 100)->nullable();
            $table->string('subject', 100)->nullable();
            $table->longText('message')->nullable();
            $table->string('status',10)->nullable();
            $table->string('message_id',20)->nullable();
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
