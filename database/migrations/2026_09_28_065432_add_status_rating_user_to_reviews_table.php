<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->after('id')->constrained()->nullOnDelete();
            $table->unsignedTinyInteger('rating')->default(5)->after('name');
            $table->string('status')->default('pending')->after('is_approved'); // pending | approved | rejected
        });

        // ulasan lama yang sudah disetujui ikut jadi "approved"
        DB::table('reviews')->where('is_approved', true)->update(['status' => 'approved']);
    }

    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_id');
            $table->dropColumn(['rating', 'status']);
        });
    }
};