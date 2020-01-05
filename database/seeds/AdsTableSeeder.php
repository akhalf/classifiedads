<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use \Illuminate\Support\Str;

class AdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i < 17; $i++){
            $title = $faker->sentence;
            $slug = Str::slug($title);
            DB::table('ads')->insert([
                'id' => $i,
                'title' => $title,
                'slug' => $slug,
                'text' => $faker->text,
                'price' => $faker->randomNumber(4),
                'user_id'=> rand(1, 5),
                'category_id' => 5,
                'country_id' => rand(1, 6),
                'currency_id' => rand(1, 6),
            ]);
        }


    }
}
