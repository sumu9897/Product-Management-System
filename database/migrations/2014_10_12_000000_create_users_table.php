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
            $table->id();
            $table->string('name');
           // $table->string('eid');
            $table->string('user_id', 6)->unique();
            $table->string('department');
            $table->string('number');
            $table->date('jdate');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default('123456');
            $table->text('profile_image')->nullable();
            $table ->tinyInteger('role_as')->default('0');
            //$table->string('created_by')->change(auth()->user()->name);         
            $table->enum('user_type', ['system', 'admin', 'user'])->default('system');
            $table->unsignedTinyInteger('belongs_to')->default(0)->comment('0=SYSTEM 1=ADMIN and 2=USER. User belongs to department except 0');
            $table->rememberToken();
            $table->unsignedTinyInteger('status')->default(1)->comment('0=Inactive,1=Active');
            $table->timestamp('created_at')->nullable();
           // $table->string('created_by');
           $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();


            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('created_by')->change();
        });
    }
}
