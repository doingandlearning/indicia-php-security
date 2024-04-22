<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('codes')->insert([
            [
                'code' => '123456',
                'enabled' => true,
            ],
            [
                'code' => '654321',
                'enabled' => true,
            ],
            [
                'code' => 'abcdef',
                'enabled' => false,
            ],
            [
                'code' => 'fedcba',
                'enabled' => false,
            ],
            [
                'code' => '1a2b3c',
                'enabled' => true,
            ]
        ]);
    }
}
