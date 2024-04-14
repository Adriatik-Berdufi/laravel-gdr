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
                $cost_cost_Array = explode(" ",$item_data[5] );
                $item = new Item;
                $item->name = $item_data[0];
                $item->description = $faker->paragraph();
                $item->slug = $item_data[1];
                $item->type = $item_data[2];
                $item->category = $item_data[3];
                $item->weight = $item_data[4];
                $item->cost = intval($cost_cost_Array[0]);
                $item->cost_unit = $cost_cost_Array[1];
                $item->damege = $item_data[6];
                if(str_contains($item_data[6], 'd')){
                  $dice_aray = explode("d",$item_data[6] );
                  $item->dice_faces = intval($dice_aray[1]);
                  $item->dice_num = intval($dice_aray[0]);
                }else{
                    $item->dice_faces = null;
                    $item->dice_num = null;
                }
            
                $item->save();
            }

            $is_first_line = false;
        };
    }
}
