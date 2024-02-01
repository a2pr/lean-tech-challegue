<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Number;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pass = [['john','02012024@@'], ['julius','02012023@@'], ['olijide','02012022@@']];

        foreach ($pass as $value) {
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => $value[0].rand(1,100).'@example.com',
                'password' => Hash::make($value[1]),
            ]);
        }
        
    }
}
