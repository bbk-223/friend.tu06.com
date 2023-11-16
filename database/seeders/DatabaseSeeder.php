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
            ['gender' => 'männlich','age' => '24','relationship'=>'single'],
            ['gender' => 'weiblich','age' => '33','relationship'=>'verheiratet'],
            ['gender' => 'männlich','age' => '42','relationship'=>'geschieden'],
            )->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
