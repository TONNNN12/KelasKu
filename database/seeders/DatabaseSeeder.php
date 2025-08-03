<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        User::create([
            'nama' => 'Rohingun',
            'email' => 'rohi@gmail.com',
            'jabatan' => 'Admin',
            'password' => Hash::make('124124124'),
            'is_tugas' => false,
        ]);
        User::create([
            'nama' => 'Anton',
            'email' => 'anton@gmail.com',
            'jabatan' => 'Siswa',
            'password' => Hash::make('124124124'),
            'is_tugas' => false,
        ]);
        User::create([
            'nama' => 'Rafit',
            'email' => 'rafit@gmail.com',
            'jabatan' => 'Siswa',
            'password' => Hash::make('124124124'),
            'is_tugas' => false,
        ]);
         User::create([
            'nama' => 'tono',
            'email' => 'tono@gmail.com',
            'jabatan' => 'Siswa',
            'password' => Hash::make('124124124'),
            'is_tugas' => false,
        ]);
    }
}
