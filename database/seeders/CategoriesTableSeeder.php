<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        $faker = Faker::create();
        
        for ($i = 0; $i < 150; $i++) {
            $title = "categories " . ($i + 12*2);
            $slug = Str::slug($title);
            DB::table('categories')->insert([
                'name' => $faker->name,
                'description' => $faker->paragraph(2),
            'slug' => $slug,]);
                

            };
    }
}
