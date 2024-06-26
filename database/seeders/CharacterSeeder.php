<?php

namespace Database\Seeders;

use App\Models\Character;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = config('characters');
        $characters = $data['characters'];
        foreach ($characters as $character) {
            $new_character = new Character;
            $new_character->fill($character);
            $new_character->save();
        }
    }
}
