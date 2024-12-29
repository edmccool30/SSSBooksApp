<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('authors')->insert([
            [
                'name' => 'J.K. Rowling',
                'birthdate' => '1965-07-31',
                'nationality' => 'British',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'George R.R. Martin',
                'birthdate' => '1948-09-20',
                'nationality' => 'American',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Austen',
                'birthdate' => '1775-12-16',
                'nationality' => 'British',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
