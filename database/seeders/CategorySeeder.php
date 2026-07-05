<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Baklawa', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ka3k', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mlabes', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Makroudh', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Autres', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}