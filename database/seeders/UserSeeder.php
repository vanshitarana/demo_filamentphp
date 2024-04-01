<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\sub_categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // DB::table('users')->insert([
        //     'name' => "admin",
        //     'email' => "admin@gmail.com",
        //     'password' => Hash::make('password'),
        // ]);

        Category::factory(10)->create();
        sub_categories::factory(10)->create();
    }
}
