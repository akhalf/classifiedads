<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $to_truncate_tables = [
        'ads',
        'categories',
        'countries',
        'currencies',
        'favorites',
        'images',
        'users',
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //Ignore Foreign Key Check
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        //Empty DB Tables
        foreach ($this->to_truncate_tables as $table){
            DB::table($table)->truncate();
        }

        //Reset Foreign Key Check
        DB::statement('SET FOREIGN_KEY_CHECKS=1');


        $this->call([
            UsersTableSeeder::class,
            CategoriesTableSeeder::class,
            CountriesTableSeeder::class,
            CurrenciesTableSeeder::class,
            FavoritesTableSeeder::class,
            ImagesTableSeeder::class,
            AdsTableSeeder::class,
        ]);

    }
}
