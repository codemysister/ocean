<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'category_name' => 'IT'
        ]);

        Category::create([
            'category_name' => 'Bisnis dan Manajemen'
        ]);

        Category::create([
            'category_name' => 'Keuangan dan Perbankan'
        ]);

        Category::create([
            'category_name' => 'Media dan Komunikasi'
        ]);

        Category::create([
            'category_name' => 'Ilmu Pengetahuan dan Riset'
        ]);

        Category::create([
            'category_name' => 'Teknik dan Teknologi'
        ]);

        Category::create([
            'category_name' => 'Kesehatan dan Kedokteran'
        ]);

        Category::create([
            'category_name' => 'Pariwisata dan Perhotelan'
        ]);

        Category::create([
            'category_name' => 'Hukum dan Keadilan'
        ]);

        Category::create([
            'category_name' => 'Seni dan Desain'
        ]);


    }
}
