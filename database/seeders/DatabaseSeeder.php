<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Opening;
use App\Models\OpeningApplication;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'DC',
            'email' => 'dc@laravel.com',
        ]);

        User::factory(300)->create();

        $users = User::all()->shuffle();

        for ($i = 0; $i < 20; $i++) {
           Employer::factory()->create([
               'user_id' => $users->pop()->id,
           ]);
        }

        $employers =Employer::all();

        for ($i = 0; $i < 100; $i++) {
            Opening::factory()->create([
                'employer_id' => $employers->random()->id
            ]);
        }

        foreach ($users as $user) {
            $openings = \App\Models\Opening::inRandomOrder()->take(rand(0, 4))->get();

            foreach ($openings as $opening) {
                OpeningApplication::factory()->create([
                    'opening_id' => $opening->id,
                    'user_id' => $user->id,
                ]);
            }
        }

    }
}
