<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('state')) {
            Schema::create('state', function (Blueprint $table) {
                $table->id();
                $table->string('state', 3)->index()->nullable();
                $table->string('title', 77)->index()->nullable();
                $table->string('state_title', 70)->index()->nullable();
                $table->string('region', 2)->index()->nullable();
                $table->string('country', 2)->index()->nullable();

            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('state');
    }
}
