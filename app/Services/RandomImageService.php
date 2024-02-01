<?php

namespace App\Services;

use App\DataTransferObjects\QuoteDto;
use GuzzleHttp\Client;

class RandomImageService {
   
    public function getRandomImage(){
        
        $client =  new Client();
        // Specify the API endpoint
        $apiEndpoint = 'https://random.imagecdn.app/v1/image?width=500&height=150';

        // Make a GET request to the API
        $response = $client->get($apiEndpoint);

        // Get the response body as a JSON string
        $jsonData = $response->getBody()->getContents();
        
        return $jsonData;
    }
}
