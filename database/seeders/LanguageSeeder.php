<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newLanguage = new Language();
        $newLanguage->name = 'HTML';
        $newLanguage->icon = 'fa-brands fa-html5';
        $newLanguage->save();


        $newLanguage = new Language();
        $newLanguage->name = 'CSS';
        $newLanguage->icon = 'fa-brands fa-css3';
        $newLanguage->save();


        $newLanguage = new Language();
        $newLanguage->name = 'JavaScript';
        $newLanguage->icon = 'fa-brands fa-js';
        $newLanguage->save();


        $newLanguage = new Language();
        $newLanguage->name = 'PHP';
        $newLanguage->icon = 'fa-brands fa-php';
        $newLanguage->save();
    }
}
