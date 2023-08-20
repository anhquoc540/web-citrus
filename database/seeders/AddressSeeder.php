<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $listAddress = [
            [
                'user_id' => 1,
                'address' => 'Q9, HCM',
                'latitude' => '10.12345',
                'longitude' => '90.4567',
            ],
            [
                'user_id' => 2,
                'address' => 'Q2, HCM',
                'latitude' => '57.12345',
                'longitude' => '90.4567',
            ],
            [
                'user_id' => 3,
                'address' => 'Q3, HCM',
                'latitude' => '70.12345',
                'longitude' => '90.4567',
            ],
            [
                'user_id' => 4,
                'address' => 'Q5, HCM',
                'latitude' => '18.12345',
                'longitude' => '80.4567',
            ],
            [
                'user_id' => 5,
                'address' => 'Thu Duc, HCM',
                'latitude' => '100.12345',
                'longitude' => '90.4567',
            ],
        ];

        foreach ($listAddress as $key => $value) {
            DB::table('addresses')->insert(
                $value
            );
        }
    }
}
