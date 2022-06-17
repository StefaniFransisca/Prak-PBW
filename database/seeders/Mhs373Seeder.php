<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Mhs373Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 50; $i++){
            DB::table('mhs373')->insert([
                    'nim' => $faker->randomNumber($nbDigits = 8, $strict = false),
                    'nama' => $faker->name(),
                    'gender' => $faker->randomElement($array = array('Pria','Wanita')),
                    'jurusan' => $faker->randomElement($array = array('Sistem Informasi','Kedokteran', 'Management', 'Arsitektur', 'Aktuaria',
                'Pariwisata', 'Farmasi', 'psikologi', 'Teknologi Informasi')),
                    'bidang_minat' => $faker->randomElement($array = array('Badminton','Basket', 'Voli', 'Melukis', 'Dance', 'Menyanyi', 'Membaca'))
                ]);
        }
    }
}
