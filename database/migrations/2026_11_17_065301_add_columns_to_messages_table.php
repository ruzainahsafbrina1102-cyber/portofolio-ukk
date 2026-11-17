<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            if (!Schema::hasColumn('messages', 'sender_name')) {
                $table->string('sender_name')->nullable();
            }
            if (!Schema::hasColumn('messages', 'sender_email')) {
                $table->string('sender_email')->nullable();
            }
            if (!Schema::hasColumn('messages', 'message')) {
                $table->text('message')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropColumn(['sender_name', 'sender_email', 'message']);
        });
    }
};