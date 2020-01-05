<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $categories = [
          'عقارات',
          'وظائف',
          'إلكترونيات',
          'سيارات',
          'أثاث',
          'مال وأعمال',
          'مواد بناء',
        ];
        $i = 0;

        foreach ($categories as $category){
            $i++;
            DB::table('categories')->insert([
                'id'=>$i,
                'category_name' => $category,
                'slug' => Str::slug($category),
            ]);
        }

    }
}
