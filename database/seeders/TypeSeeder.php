<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newType = new Type();
        $newType->name = 'Front end';
        $newType->description = 'Questo progetto è stato creato da un Front endista, usando .....';
        $newType->icon = 'fa-solid fa-code';
        $newType->save();

        $newType = new Type();
        $newType->name = 'Back end';
        $newType->description = 'Questo progetto è stato creato da un Back endista, usando .....';
        $newType->icon = 'fa-brands fa-laravel';
        $newType->save();

        $newType = new Type();
        $newType->name = 'Full stack';
        $newType->description = 'Questo progetto è stato creato da un Full stack, usando .....';
        $newType->icon = 'fa-solid fa-laptop-code';
        $newType->save();

        $newType = new Type();
        $newType->name = 'Desing';
        $newType->description = 'Questo progetto è stato creato da un Designer, usando .....';
        $newType->icon = 'fa-solid fa-palette';
        $newType->save();
    }
}
