<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // =========================
        // AKUN ADMIN
        // =========================
        User::updateOrCreate(
            ['email' => 'admin@demala.com'],
            [
                'name' => 'Admin Demala',
                'password' => 'D3mala!Adm2026#',
                'role' => 'admin',
            ]
        );

        // =========================
        // AKUN USER
        // =========================
        User::updateOrCreate(
            ['email' => 'user@demala.com'],
            [
                'name' => 'User Demala',
                'password' => 'user12345',
                'role' => 'user',
            ]
        );

        // =========================
        // DATA MENU
        // =========================
        $this->call([
            MenuSeeder::class,
        ]);
    }
}