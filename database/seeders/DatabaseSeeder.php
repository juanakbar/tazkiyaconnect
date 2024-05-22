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
        $this->call([
            RoleSeeder::class,
        ]);
        // User::factory(10)->create();
        $Admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
        $WalMur = User::create([
            'name' => 'Wali Murid 1',
            'email' => 'walmur@example.com',
            'password' => bcrypt('password'),
        ]);
        $WaliKelas = User::create([
            'name' => 'Wali Kelas 1',
            'email' => 'walikelas1@example.com',
            'password' => bcrypt('password'),
        ]);

        $Admin->assignRole('SuperAdmin');
        $WalMur->assignRole('WaliMurid');
        $WaliKelas->assignRole('WaliKelas');
    }
}
