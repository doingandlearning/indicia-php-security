<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        // Create two tenants
        $tenant1 = DB::table('tenants')->insertGetId(['name' => 'Tenant 1']);
        $tenant2 = DB::table('tenants')->insertGetId(['name' => 'Tenant 2']);

        // Create public and private members for each tenant
        for ($i = 1; $i <= 10; $i++) {
            DB::table('members')->insert([
                'tenant_id' => $tenant1,
                'name' => "Public Member $i",
                'public' => 1,
            ]);

            DB::table('members')->insert([
                'tenant_id' => $tenant1,
                'name' => "Private Member $i",
                'public' => 0,
            ]);

            DB::table('members')->insert([
                'tenant_id' => $tenant2,
                'name' => "Public Member $i",
                'public' => 1,
            ]);

            DB::table('members')->insert([
                'tenant_id' => $tenant2,
                'name' => "Private Member $i",
                'public' => 0,
            ]);
        }
    }
}
