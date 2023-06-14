<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'uuid' => Str::uuid(),
            'category_name' => 'IT'
        ]);

        Category::create([
            'uuid' => Str::uuid(),
            'category_name' => 'Bisnis dan Manajemen'
        ]);

        Category::create([
            'uuid' => Str::uuid(),
            'category_name' => 'Keuangan dan Perbankan'
        ]);

        Category::create([
            'uuid' => Str::uuid(),
            'category_name' => 'Media dan Komunikasi'
        ]);

        Category::create([
            'uuid' => Str::uuid(),
            'category_name' => 'Ilmu Pengetahuan dan Riset'
        ]);

        Category::create([
            'uuid' => Str::uuid(),
            'category_name' => 'Teknik dan Teknologi'
        ]);

        Category::create([
            'uuid' => Str::uuid(),
            'category_name' => 'Kesehatan dan Kedokteran'
        ]);

        Category::create([
            'uuid' => Str::uuid(),
            'category_name' => 'Pariwisata dan Perhotelan'
        ]);

        Category::create([
            'uuid' => Str::uuid(),
            'category_name' => 'Hukum dan Keadilan'
        ]);

        Category::create([
            'uuid' => Str::uuid(),
            'category_name' => 'Seni dan Desain'
        ]);


    }
}
