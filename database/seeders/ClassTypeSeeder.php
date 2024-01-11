<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ClassType;

class ClassTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassType::create([
            'name' => 'Yoga',
            'description' => fake()->text(),
            'minutes' => 60
        ]);

        ClassType::create([
            'name' => 'Dance',
            'description' => fake()->text(),
            'minutes' => 45
        ]);

        ClassType::create([
            'name' => 'pilates',
            'description' => fake()->text(),
            'minutes' => 60
        ]);

        ClassType::create([
            'name' => 'Boxing',
            'description' => fake()->text(),
            'minutes' => 60
        ]);
    }
}
