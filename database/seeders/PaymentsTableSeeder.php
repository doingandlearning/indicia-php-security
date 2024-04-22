<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('payments')->insert([
                'amount' => rand(1, 100),
                'description' => "Payment $i",
                'card_number' => '**** **** **** ' . rand(1000, 9999)
            ]);
        }
    }
}
