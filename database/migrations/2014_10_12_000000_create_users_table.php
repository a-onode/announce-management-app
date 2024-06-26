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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('tel')->unique();
            $table->string('password');
            $table->tinyInteger('role');
            $table->tinyInteger('gender')->nullable();
            $table->rememberToken();
            $table->string('introduction')->nullable();
            // $table->foreignId('current_team_id')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('background_image')->nullable();
            $table->date('joined_date');
            $table->timestamps();
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
