<?php

namespace Database\Seeders;

use App\Models\WorkPlace;
use Faker\Factory;
use Illuminate\Database\Seeder;

class WorkplaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for($i = 0; $i <= 10 ; $i++){
            WorkPlace::create([
                'name' => $faker->company,
                'location' => $faker->city,
                'address' => $faker->address,
                'status' => $faker->randomElement(array('Inspected','Not Inspected'))
            ]);
        }
    }
}
