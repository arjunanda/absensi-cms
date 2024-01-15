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
            $table->unsignedBigInteger('role_id')->nullable();
            $table->unsignedBigInteger('jabatan_id')->nullable();
            $table->string('name');
            $table->string('image');
            $table->string('email');
            $table->string('nip')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('status')->default(true);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
            $table->foreign('jabatan_id')->references('id')->on('jabatan')->onDelete('set null');
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
