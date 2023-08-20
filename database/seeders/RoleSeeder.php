<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $listRoles = [
            [
                'name' => 'Admin',
                'description' => 'Have all permissions',
            ],
            [
                'name' => 'Expert',
                'description' => 'Have store permissions',
            ],
            [
                'name' => 'Farmer',
                'description' => 'Only app mobile',
            ]
        ];
        foreach ($listRoles as $key => $value) {
            DB::table('roles')->insert(
                $value
            );
        }
        
    }
}
