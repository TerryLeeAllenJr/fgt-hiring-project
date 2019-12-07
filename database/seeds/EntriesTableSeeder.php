<?php

use Illuminate\Database\Seeder;

use Faker\Factory;
use App\Services\EntryService;
use App\Category;
use App\Entry;


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
        $entryService = new EntryService();

        Entry::query()->truncate();

        // Make the categories.

        $categories = Category::select('id')->get()->toArray();

        for ($x = 0; $x <= 200; $x++) {
            $entryService->createEntry([
                'title' => $faker->text(48),
                'slug'  => $faker->slug(),
                'category_id' => $categories[rand(0,count($categories) -1)]['id'],
                'short_desc' => $faker->text(200),
                'desc' => $faker->text(1000)
            ]);
        }



    }
}
