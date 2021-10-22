<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        
=======
>>>>>>> 9b3f5568e9680f30f87938b2c369f8704648635a
        
        $this->call([
            ProductSeeder::class,
            CategorySeeder::class,
            BrandSeeder::class,
        ]);

    }
}
