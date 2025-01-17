<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Section::create([
            'name' => 'قسم الجراحة'
        ]);

         Section::create([
            'name' => 'قسم العظام'
        ]);

        Section::create([
            'name' => 'قسم الانف والحنجرة'
        ]);

        Section::create([
            'name' => 'قسم الباطنية'
        ]);
    }
}
