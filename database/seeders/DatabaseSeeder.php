<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'nama' => 'admin',
        //     'username' => 'aDeMiN',
        //     'email' => 'admin@admin.com',
        //     'level' => 'admin',
        //     'avatar' => '',
        //     'password' => '123',
        // ]);

        DB::table('users')->insert([
            'nama' => 'admin',
            'username' => 'aDmInE',
            'email' => 'admin@admin.com',
            'level' => 'admin',
            'avatar' => '',
            'notelp' => '1234567890',
            'password' => Hash::make('123456'),
        ]);
    }
}
