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
            $table->renameColumn('first name', 'first_name');
            $table->renameColumn('last name', 'last_name');
            $table->enum('role', ['farmer', 'developer'])->after('last_name');
            $table->string('email')->after('role');
            $table->dropColumn('email_verified_at');
            $table->dropColumn('remember_token');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('first_name', 'first name');
            $table->renameColumn('last_name', 'last name');
            $table->dropColumn('role');
            $table->dropColumn('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
        });
    }
};
