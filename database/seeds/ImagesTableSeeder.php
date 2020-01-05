<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 17; $i++){
            DB::table('images')->insert([
                'ad_id' => $i,
                'image' => "photo-add-$i.jpg"
            ]);
        }

    }
}
