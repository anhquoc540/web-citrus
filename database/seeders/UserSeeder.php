<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $listUsers = [
            [
                'role_id' => 1,
                'email' => 'admin@gmail.com',
                'fullname' => Str::random(10),
                'phone' => '0925465485',
                'address_id' => 1,
                'status' => 1, //1 is active, 0 is not active, 2 closed .....
                'lg_mobile' => 2,
                'password' => Hash::make('12345'),
            ],
            [
                'role_id' => 2,
                'email' => 'expert@gmail.com',
                'fullname' => Str::random(10),
                'phone' => '0925465547',
                'address_id' => 2,
                'status' => 1, //1 is active, 0 is not active, 2 closed .....
                'lg_mobile' => 2,
                'password' => Hash::make('12345'),
            ],
            [
                'role_id' => 3,
                'email' => '',
                'fullname' => Str::random(10),
                'phone' => '0921635678',
                'address_id' => 3,
                'status' => 1, //1 is active, 0 is not active, 2 closed .....
                'lg_mobile' => 1,
                'password' => Hash::make('12345'),
            ]
        ];

        foreach ($listUsers as $key => $value) {
            DB::table('users')->insert(
                $value
            );
        }
        
    }
}
