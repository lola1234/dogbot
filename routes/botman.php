<?php

use App\Conversations\startConversation;

$botman = resolve('botman');

$botman->hears('/random', 'App\Http\Controllers\AllBreedsController@random');
$botman->hears('/b {breed}', 'App\Http\Controllers\AllBreedsController@byBreed');
$botman->hears('/s {breed}:{subBreed}', 'App\Http\Controllers\AllBreedsController@bySubBreed');

$botman->hears('Start Conversation', 'App\Http\Controllers\ConversationController@index');
