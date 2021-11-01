<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::truncate();

    //     $data = [];

    //     $faker = \Faker\Factory::create();

    //     for ($i = 0; $i < 5; $i++) {
    //         $data[] = [
    //             'name' => $faker->name,
    //             'user_id' => rand(1, 3),
    //         ];
    //     }

    //    Brand::insert($data);
        
    }
}
