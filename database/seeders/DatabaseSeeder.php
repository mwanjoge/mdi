<?php

namespace Database\Seeders;

use App\Models\Bill;
use App\Models\Disease;
use App\Models\Employee;
use App\Models\User;
use App\Models\WorkPlace;
use Faker\Factory;
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
        // \App\Models\User::factory(10)->create();
        //medical inspection system DR Nyumba Hypertension, Diabetes mellitus, Asthma, Sickle Cell Disease,
        Disease::insert([
            [
                'category' => 'Family History Diseases',
                'name' => 'Hypertension',
            ],
            [
                'category' => 'Family History Diseases',
                'name' => 'Diabetes mellitus',
            ],
            [
                'category' => 'Family History Diseases',
                'name' => 'Asthma',
            ],
            [
                'category' => 'Family History Diseases',
                'name' => 'Sickle Cell Disease',
            ]
        ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);
        /*$faker = Factory::create();
        for($i = 0; $i <= 10 ; $i++){
            Employee::create([
                'work_place_id' => $faker->randomElement([1,2,3,4,5,6,7,8,9,10,11]),
                'name' => $faker->firstName,
                'gender' => $faker->randomElement(['male','female']),
                'birthday' => now(),
                'entryDate' => now(),
                'phone' => $faker->phoneNumber,
                'nationality' => $faker->country,
                'email'=> $faker->email,
                'contractType' => $faker->word
            ]);
        }*/
        /*for($i = 0; $i <= 10 ; $i++){
            Bill::create([
                'work_place_id' => $faker->randomElement([1,2,3,4,5,6,7,8,9,10,11]),
                'control_number' => $faker->randomElements([1,8]),
                'amount' => $faker->randomElement([1,5]),
                'isPaid' => $faker->randomElement(['0','1']),
                'billable_date' => now()
            ]);
        }*/
        //$this->call(WorkplaceTableSeeder::class);
    }
}
