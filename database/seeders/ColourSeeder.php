<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colours = [
            ['name' => 'Red'],
            ['name' => 'Blue'],
            ['name' => 'White'],
            ['name' => 'Black'],
        ];

        DB::table('colours')->insert($colours);
    }
}
