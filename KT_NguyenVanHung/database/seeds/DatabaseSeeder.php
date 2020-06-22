<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $faker = Faker\Factory::create();
            for($i=0;$i<10;$i++){
                DB::table('tours')->insert(
                    [
                        'name'=> $faker->name,
                        'image' => $i.".jpg",
                        'type_tour'=> $faker->company,
                        'schedule'=> $faker->name,
                        'depart' => $faker->date($format = 'd-m-Y', $min = 'now'),
                        'number_people'=>$faker->numberBetween($min = 1, $max = 9),
                        'price'=>$faker->numberBetween($min = 1000, $max = 9000),
                    ]);
            }
    }
}
