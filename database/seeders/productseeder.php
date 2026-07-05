<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Baklawa',
                'description' => 'Feuilletés au miel et aux noix',
                'price' => 15.00,
                'stock' => 50,
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ka3k',
                'description' => 'Gâteaux traditionnels tunisiens',
                'price' => 8.00,
                'stock' => 30,
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mlabes',
                'description' => 'Dragées et confiseries fines',
                'price' => 12.00,
                'stock' => 100,
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Makroudh',
                'description' => 'Gâteaux aux dattes et à la semoule',
                'price' => 10.00,
                'stock' => 60,
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
