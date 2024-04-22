<?php

namespace Database\Seeders;

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
            'email' => 'test@test.com',
            'password' => 'password',
        ]);

        User::factory()->create([
            'email' => 'email@example.com',
            'password' => 'password',
        ]);

        User::factory()->count(5)->create();

        // Repeat the above lines for each known email address you want to add
        $this->call(MembersTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
        $this->call(CodesTableSeeder::class);
    }
}
