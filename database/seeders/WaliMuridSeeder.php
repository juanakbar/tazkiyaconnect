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
        for ($i = 0; $i < 10; $i++) {
            DB::table('wali_murids')->insert([
                'id' => $faker->uuid,
                'user_id' => $user->id,
                'slug' => Str::slug($faker->sentence),
                'nik' => $faker->numerify('##############'),
                'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date(),
                'pendidikan' => $faker->randomElement(['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3']),
                'pekerjaan' => $faker->jobTitle,
                'pendapatan' => $faker->randomElement(['< Rp. 1.000.000', 'Rp. 1.000.000 - Rp. 5.000.000', '> Rp. 5.000.000']),
                'kewarganeraan' => $faker->randomElement(['WNI', 'WNA']),
                'province_code' => '11',
                'city_code' => '1108',
                'district_code' => '110827',
                'village_code' => '1108272001',
                'alamat' => $faker->address,
                'avatar' => $faker->imageUrl(),
            ]);
        }
    }
}
