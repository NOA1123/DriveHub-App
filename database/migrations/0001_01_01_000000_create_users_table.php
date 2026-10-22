<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('users');

        Schema::create('users', function (Blueprint $table) {
            $table->increments('userid');
            $table->string('username', 50);
            $table->string('password', 255);
            $table->string('phone', 10);
            $table->string('email', 100);
            $table->string('user_type', 50)->default('User');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};