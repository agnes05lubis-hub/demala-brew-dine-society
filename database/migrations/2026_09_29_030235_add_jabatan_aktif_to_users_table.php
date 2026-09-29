<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'jabatan')) {
                $table->string('jabatan')->nullable()->after('role');
            }
            if (! Schema::hasColumn('users', 'aktif')) {
                $table->boolean('aktif')->default(true)->after('jabatan');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'jabatan')) {
                $table->dropColumn('jabatan');
            }
            if (Schema::hasColumn('users', 'aktif')) {
                $table->dropColumn('aktif');
            }
        });
    }
};