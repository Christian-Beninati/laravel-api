<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Technologies = [
            ['label' => 'Html', 'color' => 'danger'],
            ['label' => 'Css', 'color' =>  'info'],
            ['label' => 'Js', 'color' => 'warning'],
            ['label' => 'Vue.js', 'color' => 'success-emphasis'],
            ['label' => 'React', 'color' => 'success'],
            ['label' => 'Angular', 'color' => 'danger-emphasis'],
            ['label' => 'Tailwind', 'color' => 'primary-emphasis'],
            ['label' => 'Php', 'color' => 'primary'],
            ['label' => 'Laravel', 'color' => 'info'],
            ['label' => 'Phyton', 'color' => 'warning-emphasis',],
            ['label' => 'Java', 'color' => 'info-emphasis'],
        ];

        foreach ($Technologies as $technology) {
            $new_technology = new Technology();
            $new_technology->label = $technology['label'];
            $new_technology->color = $technology['color'];
            $new_technology->save();
        }
    }
}
