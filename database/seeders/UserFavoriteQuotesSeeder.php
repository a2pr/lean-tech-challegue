<?php

namespace Database\Seeders;

use App\Models\UserFavoriteQuote;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserFavoriteQuotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $existingRecords = User::all();

        // Create new records based on the existing data
        foreach ($existingRecords as $record) {
            // Adjust the attributes or create new records as needed
            UserFavoriteQuote::create([
                'user_id' => $record->id,
                'quote' =>  Str::random(50),
            ]);
        }
    }
}
