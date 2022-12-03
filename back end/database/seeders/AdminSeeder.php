<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          // for users table
          DB::table('users')->insert(
            [
                array(
                    'name' => 'admin',
                    'email' => 'admin@info.com',
                    'password' => Hash::make('123456789'),
                    'rule_id' => 1,
                ),
                array(
                    'name' => 'user',
                    'email' => 'user@info.com',
                    'password' => Hash::make('123456789'),
                    'rule_id' => 0,
                ),
            ]
        );
    }
}
