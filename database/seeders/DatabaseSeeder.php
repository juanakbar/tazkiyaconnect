<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $roles = ['Admin', 'Wali Kelas', 'Wali Murid'];
        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }

        // Buat user dengan role secara acak
        foreach (range(1, 10) as $index) {
            $roleName = $roles[array_rand($roles)]; // Pilih role secara acak
            User::factory()->withRole($roleName)->create();
        }
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),
            'role_id' => Role::first()->id,
        ]);
        User::create([
            'name' => 'walikelas',
            'email' => 'walikelas@example.com',
            'password' => bcrypt('walikelas123'),
            'role_id' => Role::where('name', 'Wali Kelas')->first()->id,
        ]);
        User::create([
            'name' => 'walimurid',
            'email' => 'walimurid@example.com',
            'password' => bcrypt('walimurid123'),
            'role_id' => Role::where('name', 'Wali Murid')->first()->id,
        ]);
        // $this->call([
        //     RoleSeeder::class,
        // ]);
    }
}
