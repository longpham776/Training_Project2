<?php

namespace Database\Seeders;

use App\Models\mst_model_v2 as ModelsMst_model_v2;
use Illuminate\Database\Seeder;

class Mst_model_v2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        ModelsMst_model_v2::factory(500)
            ->create([
                'model_maker_code' => $faker->numberBetween(0, 86),
                'model_hyouji' => $faker->name(),
                'model_search_key' => $faker->word(),
                'model_name' => $faker->name(),
                'model_kana' => $faker->name(),
                'type_code' => $faker->numberBetween(0, 9999999999),
                'model_displacement' => $faker->numberBetween(0, 9999),
                'model_iamge' => $faker->image(null, 360, 360, 'animals', true, true, 'cats', true, 'jpg'),
                'model_image_url' => $faker->imageUrl(360, 360, 'animals', true, 'dogs', true, 'jpg'),
                'model_image_url2' => $faker->imageUrl(360, 360, 'animals', true, 'dogs', true),
                'model_name_prefix' => $faker->word(),
                'model_kana_prefix' => $faker->word(),
                'model_count' => $faker->numberBetween(0, 9999999999),
                'model_rank' => $faker->numberBetween(0, 9999),
                'model_color_price' => $faker->colorName(),
            ]);
    }
}
