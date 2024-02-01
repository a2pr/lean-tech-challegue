<?php

namespace Database\Seeders;

use App\Models\UserFavoriteQuote;
use App\Models\User;
use App\Services\ZenQuotesService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserFavoriteQuotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $service = new ZenQuotesService;
        $existingRecords = User::all();

        $data = $service->getQuotes();
        
        $i=0;
        // Create new records based on the existing data
        foreach ($existingRecords as $record) {
            // Adjust the attributes or create new records as needed
            UserFavoriteQuote::create([
                'user_id' => $record->id,
                'quote' =>  $data[$i]->getQuote(),
            ]);
            $i++;
        }
    }
}
