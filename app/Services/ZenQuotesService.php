<?php

namespace App\Services;

use App\DataTransferObjects\QuoteDto;
use GuzzleHttp\Client;

class ZenQuotesService {
    public function getQuotes(int $limit = 5): array
    {
        $client =  new Client();
        // Specify the API endpoint
        $apiEndpoint = 'https://zenquotes.io/api/quotes/';

        // Make a GET request to the API
        $response = $client->get($apiEndpoint);

        // Get the response body as a JSON string
        $jsonData = $response->getBody()->getContents();

        // Decode the JSON data into an associative array
        $data = json_decode($jsonData, true);

        foreach ($data as $value) {
            if (isset($value['q'])) {
                $quote = $value['q'];
                echo "Quote: $quote\n";
            
            } else {
                echo "Failed to retrieve a quote from the API.";
            }
        }
        
        $data = array_slice($data, 0, $limit);
    
        $quotes = [];
        foreach ($data as $value) {
            $quote = new QuoteDto($value['q']);
            $quotes[] = $quote;
        }

        return $quotes;
    }
}
