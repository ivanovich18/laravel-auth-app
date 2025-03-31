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
        Schema::table('users', function (Blueprint $table) {
            $table->string('google_id')->nullable()->unique()->after('email');
            $table->string('google_token')->nullable()->after('google_id'); // Optional
            $table->string('google_refresh_token')->nullable()->after('google_token'); // Optional
            $table->timestamp('email_verified_at')->nullable()->change(); // Make email verification optional if logging in via Google
            $table->string('password')->nullable()->change(); // Make password optional
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['google_id', 'google_token', 'google_refresh_token']);
            $table->timestamp('email_verified_at')->nullable(false)->change(); // Revert changes if needed
            $table->string('password')->nullable(false)->change(); // Revert changes if needed
        });
    }
};
