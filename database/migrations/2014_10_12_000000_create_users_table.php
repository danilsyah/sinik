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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('phone')->unique();
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('nama_rule')->unique();
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // add relasi employees
            $table->unsignedBigInteger('employee_id');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // tambahkan relasi role
            $table->unsignedBigInteger('role_id');
            $table->string('username')->unique();
            $table->rememberToken();
            $table->timestamps();

        });

        Schema::table('users', function (Blueprint $table){
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('roles');
        Schema::dropIfExists('employees');
    }
}
