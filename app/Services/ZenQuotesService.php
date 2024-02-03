<?php

namespace App\Services;

use App\DataTransferObjects\QuoteServiceDto;
use GuzzleHttp\Client;

use function PHPUnit\Framework\isInstanceOf;

class ZenQuotesService {
    public function getQuotes(int $limit = 5): array
    {
        // Get the response body as a JSON string
        $jsonData = $this->makeRequest()->getBody()->getContents();
        // Decode the JSON data into an associative array
        $data = json_decode($jsonData, true);

        foreach ($data as $value) {
            if (isset($value['q'])) {
                $quote = $value['q'];
                //echo "Quote: $quote\n";
            
            } else {
                echo "Failed to retrieve a quote from the API.";
            }
        }
        
        if(empty($data)){
            //limit of api request reached.
            return [];
        }

        $data = array_slice($data, 0, $limit);
    
        $quotes = [];
        foreach ($data as $value) {
            $quote = new QuoteServiceDto($value['q']);
            $quotes[] = $quote;
        }

        return $quotes;
    }

    public function makeRequest(){
        $client =  new Client();
        // Specify the API endpoint
        $apiEndpoint = 'https://zenquotes.io/api/quotes/';

        // Make a GET request to the API
        return $client->get($apiEndpoint);
    }
}
