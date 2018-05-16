<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;

class DogService
{
	//Endpoint to receive a random dog image
	const RANDOM_ENDPOINT = 'https://dog.ceo/api/breeds/image/random';
	const BREED_ENDPOINT = 'https://dog.ceo/api/breed/%s/images/random';
	const SUB_BREED_ENDPOINT = 'https://dog.ceo/api/breed/%s/%s/images/random';

	/**
     * Guzzle client.
     *
     * @var GuzzleHttp\Client
    */
	protected $client;

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
		try{
			//Decode the json response.
			$response = json_decode(
				$this->client->get(self::RANDOM_ENDPOINT)->getBody()
			);

			//Return the image URL.
			return $response->message;
		}catch(Exception $e){
			//Error messaga for the user if anything goes wrong
			return 'An unexpected error occurred.Please try again later';
		}
	}

	/**
	 * Fetch and return a random image from a given breed.
	 *
	 * @param string $breed
	 * @return string
	*/
	public function byBreed($breed)
	{
		try{
			//Replace %s in endpoint with the given breed name.
			$endpoint = sprintf(self::BREED_ENDPOINT, $breed);

			//Decode the json response.
			$response = json_decode(				
				$this->client->get($endpoint)->getBody()
			);

			//Return the breed image URL
			return $response->message;
		}catch(Exception $e){
			//Error message if anything goes wrong or breed not found
			return  "Sorry I couldn\"t get you any photos from $breed. Please try with a different breed.";
		}
	}	

	/**
	 * Fetch and return a random image from a given breed.
	 *
	 * @param string $breed
	 * @return string
	*/
	public function bySubBreed($breed, $subBreed)
	{
		try{
			//Replace %s in endpoint with the given breed and sub-breed name.
			$endpoint = sprintf(self::SUB_BREED_ENDPOINT, $breed, $subBreed);

			//Decode the json response.
			$response = json_decode(				
				$this->client->get($endpoint)->getBody()
			);

			//Return the breed image URL
			return $response->message;
		}catch(Exception $e){
			//Error message if anything goes wrong or breed not found
			return  "Sorry I couldn\"t get you any photos from $breed. Please try with a different breed.";
		}
	}	
}