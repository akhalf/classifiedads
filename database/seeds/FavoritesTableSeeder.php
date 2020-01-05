<?php

use Illuminate\Database\Seeder;

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++){
            DB::table('favorites')->insert([
                'user_id' => rand(1,5),
                'ad_id' => rand(1,17),
            ]);
        }

    }
}
