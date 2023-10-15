<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;

class DogService
{
    // The endpoint we will be getting a random image from.
    const RANDOM_ENDPOINT = 'https://dog.ceo/api/breeds/image/random';

    /**
     * Guzzle client.
     *
     * @var GuzzleHttp\Client
     */
    protected $client;

    /**
     * DogService constructor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->client = new Client;
    }

    /**
     * Fetch and return a random image from all breeds.
     *
     * @return string
     */
    public function random()
    {
        try {
            // Decode the json response.
            $response = json_decode(
                // Make an API call an return the response body.
                $this->client->get(self::RANDOM_ENDPOINT)->getBody()
            );
				
            // Return the image URL.
            return $response->message;
        } catch (Exception $e) {
            // If anything goes wrong, we will be sending the user this error message.
            return 'An unexpected error occurred. Please try again later.';
        }
    }

    // The endpoint we will hit to get a random image by a given breed name.
const BREED_ENDPOINT = 'https://dog.ceo/api/breed/%s/images/random';

    // The endpoint we will hit to get a random image by a given breed name and its sub-breed.
        const SUB_BREED_ENDPOINT = 'https://dog.ceo/api/breed/%s/%s/images/random';
}