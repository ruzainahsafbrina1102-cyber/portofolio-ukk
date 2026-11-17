<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('class_major')->nullable();
            $table->string('headline')->nullable();
            $table->string('avatar')->nullable();
            $table->string('cv_file')->nullable();
            $table->text('about_me')->nullable();
            $table->text('education')->nullable();
            $table->text('career_goal')->nullable();
            $table->string('email')->nullable();
            $table->string('github')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};