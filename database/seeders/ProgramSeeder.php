<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class ProgramSeeder extends Seeder
{
    /**
    * Run the database seeds.
    */
    public function run(): void
    {
        Program::create([
            'category_id' => 1,
            'mitra_profiles_id' => 1,
            'title' => 'Fullstack Developer Intern',
            'slug' => Str::slug('Fullstack Developer Intern') . '-' . Str::random(6),
            'work_mode' => 'Work From Home (WFH)',
            'duration' => 6,
            'intern_type' => 'Paid',
            'description' => 'Magang Fullstack Developer bersama PT Ocean',
            'guidebook' => 'guidebook.pdf',
            'start' => '2023-06-04 06:43:00',
            'end' => '2024-01-01 00:00:00'
        ]);

        Program::create([
            'category_id' => 1,
            'mitra_profiles_id' => 1,
            'title' => 'Backend Developer Intern',
            'slug' => Str::slug('Backend Developer Intern') . '-' . Str::random(6),
            'work_mode' => 'Work From Office (WFO)',
            'duration' => 3,
            'intern_type' => 'Paid',
            'description' => 'Magang Backend Developer bersama PT Ocean',
            'guidebook' => 'guidebook.pdf',
            'start' => '2023-06-04 06:43:00',
            'end' => '2023-09-01 00:00:00'
        ]);

        Program::create([
            'category_id' => 1,
            'mitra_profiles_id' => 1,
            'title' => 'Frontend Developer Intern',
            'slug' => Str::slug('Frontend Developer Intern') . '-' . Str::random(6),
            'work_mode' => 'Work From Home (WFH)',
            'duration' => 6,
            'intern_type' => 'Unpaid',
            'description' => 'Magang Frontend Developer bersama PT Ocean',
            'guidebook' => 'guidebook.pdf',
            'start' => '2023-07-10 09:00:00',
            'end' => '2023-12-31 18:00:00'
        ]);

        Program::create([
            'category_id' => 2,
            'mitra_profiles_id' => 1,
            'title' => 'Marketing Intern',
            'slug' => Str::slug('Marketing Intern') . '-' . Str::random(6),
            'work_mode' => 'Work From Home (WFH)',
            'duration' => 4,
            'intern_type' => 'Paid',
            'description' => 'Magang Marketing bersama PT Ocean',
            'guidebook' => 'guidebook.pdf',
            'start' => '2023-08-15 10:00:00',
            'end' => '2023-12-15 16:30:00'
        ]);

        Program::create([
            'category_id' => 2,
            'mitra_profiles_id' => 2,
            'title' => 'Software Engineer',
            'slug' => Str::slug('Software Engineer') . '-' . Str::random(6),
            'work_mode' => 'Work From Home (WFH)',
            'duration' => 4,
            'intern_type' => 'Paid',
            'description' => 'Magang bersama PT GoTo',
            'guidebook' => 'guidebook.pdf',
            'start' => '2023-08-15 10:00:00',
            'end' => '2023-12-15 16:30:00'
        ]);

        Program::create([
            'category_id' => 1,
            'mitra_profiles_id' => 2,
            'title' => 'Business Development',
            'slug' => Str::slug('Business Development') . '-' . Str::random(6),
            'work_mode' => 'Work From Home (WFH)',
            'duration' => 4,
            'intern_type' => 'Paid',
            'description' => 'Magang bersama PT GoTo',
            'guidebook' => 'guidebook.pdf',
            'start' => '2023-08-15 10:00:00',
            'end' => '2023-12-15 16:30:00'
        ]);
    }
}
