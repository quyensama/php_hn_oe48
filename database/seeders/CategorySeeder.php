<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $categories = Category::factory()->count(10)->create();

        foreach ($categories as $key => $value) {
            $parent_id = $faker->numberBetween(1, 10);
            $categories[$key]['parent_id'] = Category::find($value->id)->update([
                "parent_id" => $parent_id
            ]);
        }
    }
}
