<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WaliMuridSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        // Generate random data for 10 records
        $user = User::where('name', 'Wali Murid 1')->first();
        for ($i = 0; $i < 50; $i++) {
            DB::table('wali_murids')->insert([
                'id' => $faker->uuid,
                'user_id' => $user->id,
                'slug' => Str::slug($faker->sentence),
                'nik' => $faker->numerify('##############'),
                'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date(),
                'pendidikan' => $faker->randomElement(['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3']),
                'pekerjaan' => $faker->jobTitle, 'kewarganeraan' => $faker->randomElement(['WNI', 'WNA']),
                'alamat' => $faker->address,
                'avatar' => $faker->imageUrl(),
            ]);
        }
    }
}
