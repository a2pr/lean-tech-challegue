<?php

namespace App\Services;
use GuzzleHttp\Client;

class ZenQuotesService {
    public function getQuotes(int $limit = 5){
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
        
        return array_slice($data, 0, $limit);
    }


    public function getImages(int $number = 1){
        
        $client =  new Client();
        // Specify the API endpoint
        $apiEndpoint = 'https://zenquotes.io/api/image/';

        // Make a GET request to the API
        $response = $client->get($apiEndpoint);

        // Get the response body as a JSON string
        $jsonData = $response->getBody()->getContents();

        // Decode the JSON data into an associative array
        $data = json_decode($jsonData, true);

    }
}
