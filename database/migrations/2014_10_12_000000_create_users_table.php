<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name',100)->nullable();
            $table->string('last_name',100)->nullable();
            $table->string('username',100)->index()->unique();
            $table->string('title',100)->index()->nullable();
            $table->enum('gender',['male','female'])->index()->nullable();
            $table->enum('status',['pending','active','suspended'])->default('pending')->nullable();
            $table->string('email',100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',150);
//            $table->string('security_qn',150)->nullable();
//            $table->string('security_ans',150)->nullable();
            $table->string('secondary_email',100)->nullable();
            $table->string('captcha',100)->nullable();
            $table->string('phone',15)->index()->nullable();
//            $table->char('nin', 14)->index()->unique();
            $table->timestamp('banned_until')->nullable();
            $table->text('digital_signature_path')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('profile_picture',255)->nullable();

            $table->string('current_role',100)->default('none')->index()->nullable();
            $table->string('admin_assigned_role',100)->index()->nullable();
            $table->enum('admin_assigned_role_activated',['yes','no'])->index()->nullable();

            $table->integer('external_id')->index()->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();

            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
