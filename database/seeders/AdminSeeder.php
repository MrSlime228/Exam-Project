<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Администратор Системы',
            'phone' => '+7 (900) 000-00-00',
            'login' => 'admin',
            'email' => 'admin@myrestoration.ru',
            'password' => Hash::make('admin2025'),
            'is_admin' => true,
        ]);
    }
}