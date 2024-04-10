<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = fopen(__DIR__ . '/../csv/types.csv', 'r');
        $is_first_line = true;

        while (!feof($file)) {
            $type_data = fgetcsv($file);
            if (!$is_first_line) {
                $type = new Type;
                $type->name = $type_data[0];
                $type->slug = Str::slug($type->name);
                $type->image = $type_data[1];
                $type->description = $type_data[2];
                $type->save();
            }
            $is_first_line = false;
        };
    }
}
