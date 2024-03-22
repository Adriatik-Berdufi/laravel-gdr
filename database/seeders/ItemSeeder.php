<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $file = fopen(__DIR__ . '/../csv/items.csv', 'r');
        $is_first_line = true;

        while (!feof($file)) {
            $item_data = fgetcsv($file);
            if (!$is_first_line) {
                $item = new Item;
                $item->name = $item_data[0];
                $item->description = $faker->paragraph();
                $item->slug = $item_data[1];
                $item->type = $item_data[2];
                $item->category = $item_data[3];
                $item->weight = $item_data[4];
                $item->cost = $item_data[5];
                $item->save();
            }

            $is_first_line = false;
        };
    }
}
