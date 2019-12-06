<?php

use Illuminate\Database\Seeder;

use Faker\Factory;
use App\Category;
use App\User;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        try {
            $user = User::firstOrFail();
        }catch(\Exception $e) {
            dd('You must first create a user using the Laravel authentication layer.');
        }

        $faker = Faker\Factory::create();

        // Truncate the categories.
        Category::query()->truncate();


        $totalParents = rand(3,5);

        for ($x = 0; $x <= $totalParents; $x++) {

            // Make the parents.
            $category = new Category([
                'name' => ucfirst($faker->word),
                'slug' => 'category-'.$x,
                'user_id' => $user->id
            ]);

            $category->save();
            var_dump($category->toArray());

            $subCategories = rand(1,3);

            for($i=0;$i>=$subCategories;$i++) {
                $subCategory = new Category([
                    'name' => $faker->word,
                    'slug' => 'subcategory-'.$x.'-'.$i,
                    'user_id' => $user->id
                ]);
                var_dump($subCategory->toArray());
            }


        }



    }
}
