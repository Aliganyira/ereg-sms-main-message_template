<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddingInnerJoinUserTableMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_inner_join', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->bigInteger('user_id')->index();
            $table->enum('join_type',['organisation','department','office'])->default('organisation')->index();
            $table->bigInteger('join_id')->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_inner_join');
    }
}
