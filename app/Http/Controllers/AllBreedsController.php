<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DogService;

class AllBreedsController extends Controller
{
    /**
     * Controller constructor
     * 
     * @return void
    */
    public function __construct()
    {
    	$this->photo = new DogService;
    }
    /**
     * Return a random dog image from all breeds.
     *
     * @return void
    */
    public function random($bot)
    {
    	// $this->photos->random() is basically the photo URL returned from the service.
        // $bot->reply is used to send a message back to the user.
        $bot->reply($this->photo->random());
    }

    /**
    * Return a random dog image from a given breed.
    *
    * @return void
    */
    public function byBreed($bot, $name)
    {
    	//A wildcard in the command definition, Botman will pass it method.
   		//Service class handle the API call and we reply with the result we get back.
    	$bot->reply($this->photo->byBreed($name));
    }

    /**
    * Return a random dog image from a given breed and sub-breed.
    *
    * @return void
    */
    public function bySubBreed($bot, $breed, $subBreed)
    {
    	//A wildcard in the command definition, Botman will pass it method.
   		//Service class handle the API call and we reply with the result we get back.
    	$bot->reply($this->photo->bySubBreed($breed,$subBreed));
    }
}
