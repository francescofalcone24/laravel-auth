<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        if (!User::where("email", "luca@lambia.it")->first()) {
            $mainUser = new User();
            $mainUser->name = "Luca";
            $mainUser->email = "luca@lambia.it";
            $mainUser->password = Hash::make('1backdoor2big');
            $mainUser->save();
        };
        if (!User::where("email", "adm@adm.it")->first()) {
            $mainUser = new User();
            $mainUser->name = "Adm";
            $mainUser->email = "adm@adm.it";
            $mainUser->password = Hash::make('asd123');
            $mainUser->save();
        }
        if (!User::where("email", "admin@admin.it")->first()) {
            $mainUser = new User();
            $mainUser->name = "Admin";
            $mainUser->email = "admin@admin.it";
            $mainUser->password = Hash::make('admin');
            $mainUser->save();
        }
    }
}
