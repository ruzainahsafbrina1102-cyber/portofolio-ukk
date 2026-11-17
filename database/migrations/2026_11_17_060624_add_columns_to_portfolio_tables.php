<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('skills', function (Blueprint $table) {
            if (!Schema::hasColumn('skills', 'name')) $table->string('name')->nullable();
            if (!Schema::hasColumn('skills', 'level')) $table->string('level')->nullable();
            if (!Schema::hasColumn('skills', 'icon')) $table->string('icon')->nullable();
        });

        Schema::table('projects', function (Blueprint $table) {
            if (!Schema::hasColumn('projects', 'title')) $table->string('title')->nullable();
            if (!Schema::hasColumn('projects', 'category')) $table->string('category')->nullable();
            if (!Schema::hasColumn('projects', 'image')) $table->string('image')->nullable();
            if (!Schema::hasColumn('projects', 'link')) $table->string('link')->nullable();
            if (!Schema::hasColumn('projects', 'description')) $table->text('description')->nullable();
        });

        Schema::table('certificates', function (Blueprint $table) {
            if (!Schema::hasColumn('certificates', 'title')) $table->string('title')->nullable();
            if (!Schema::hasColumn('certificates', 'issuer')) $table->string('issuer')->nullable();
            if (!Schema::hasColumn('certificates', 'year')) $table->string('year')->nullable();
            if (!Schema::hasColumn('certificates', 'file')) $table->string('file')->nullable();
        });

        Schema::table('experiences', function (Blueprint $table) {
            if (!Schema::hasColumn('experiences', 'position')) $table->string('position')->nullable();
            if (!Schema::hasColumn('experiences', 'company')) $table->string('company')->nullable();
            if (!Schema::hasColumn('experiences', 'period')) $table->string('period')->nullable();
            if (!Schema::hasColumn('experiences', 'description')) $table->text('description')->nullable();
        });

        Schema::table('testimonials', function (Blueprint $table) {
            if (!Schema::hasColumn('testimonials', 'name')) $table->string('name')->nullable();
            if (!Schema::hasColumn('testimonials', 'role')) $table->string('role')->nullable();
            if (!Schema::hasColumn('testimonials', 'content')) $table->text('content')->nullable();
        });

        Schema::table('articles', function (Blueprint $table) {
            if (!Schema::hasColumn('articles', 'title')) $table->string('title')->nullable();
            if (!Schema::hasColumn('articles', 'content')) $table->text('content')->nullable();
        });
    }

    public function down(): void
    {
        //
    }
};