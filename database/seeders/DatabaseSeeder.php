<?php

namespace Database\Seeders;

use App\Models\Bill;
use App\Models\Disease;
use App\Models\Category;
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
        $diseaseCategories = [
            'cat1'=>[
                'name' => 'Family History Diseases',
                'discriptions' => 'History of Diseases in Family',
                'diseases' => [
                    'Hypertension',
                    'Diabetes mellitus',
                    'Asthma',
                    'Sickle Cell Disease',
                ]
            ],
            'cat2' => [
                'name' => 'Systemic Review',
                'discriptions' => 'Systemic Review',
                'diseases' => [
                    'Chronic diarrhea > 2 weeks',
                    'Chronic cough > 4 weeks',
                    'Chronic abdominal pain',
                    'STI',
                    'Weight loss',
                    'Recurrent fever',
                    'Chest pain and heart beat awareness',
                    'Hearing difficulty',
                    'Ear discharge',
                    'Malaria/tropical diseases',
                    'Lower back pain',
                    'Nausea/vomiting',
                    'Swollen/ painful joints',
                    'Conjunctivitis',
                    'Recurrent cough',
                    'Attacks of difficulty in breathing',
                    'Visual problems',
                    'Others'
                ]
            ],
            'cat2' => [
                'name' => 'Past Medical History',
                'discriptions' => 'Past Medical History',
                'diseases' => [
                    'Non Occupational Related',
                    'Occupational Related',
                    'Diabetes mellitus (sugar sickness)',
                    'Fits, fainting, backouts, Epilepsy',
                    'Psychiatric illness',
                    'High Blood Pressure/ Heart problems',
                    'Chest disease/ Asthma/ shortness of breath',
                    'Major surgeries/ operations',
                    'PUD',
                    'Allergies',
                    'Chronic back pain > 4 weeks ',
                    'Serious injuries or accident',
                    'Others'
                ],
            ],
        ];
        foreach($diseaseCategories as $cat){
            $category = Category::create(['name' => $cat['name'],'descriptions' => $cat['discriptions']]);
            foreach($cat['diseases'] as $dis){
                $disease = new Disease(['name' => $dis]);
                $category->diseases()->save($disease);
            }
        }
        //Disease::insert();
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
