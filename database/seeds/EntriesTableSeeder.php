<?php

use Illuminate\Database\Seeder;

use App\Services\EntryService;
use App\Category;


class EntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $categories = Category::select('id')->get()->toArray();

        $entryService = new EntryService();

        for ($x = 0; $x <= 400; $x++) {
            $entryService->createEntry([
                'title' => $faker->text(128),
                'slug'  => $faker->slug(),
                'category_id' => $categories[rand(0,count($categories) -1)]['id'],
                'short_desc' => $faker->text(200),
                'desc' => $faker->text(1000)
            ]);
        }



    }
}
