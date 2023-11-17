<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(29)->sequence(
            ['gender' => 'männlich','relationship'=>'single','profile_picture'=>'test'],
            ['gender' => 'weiblich','relationship'=>'verheiratet','profile_picture'=>'test'],
            ['gender' => 'männlich','relationship'=>'geschieden','profile_picture'=>'test'],
            )->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
