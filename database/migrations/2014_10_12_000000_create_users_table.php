<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('fullname')->nullable();
            $table->string('phone')->unique();
            $table->integer('address_id')->nullable();
            $table->integer('status'); // 0 = inactive, 1 = active, 2 = closed
            $table->integer('lg_mobile'); // 1 is loging mobile, 2 is web admin
            $table->integer('role_id');
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
