<?php

require __DIR__ . '/../vendor/autoload.php';

use Pokedex\Models\Pokemon;

$router = new AltoRouter();

$baseUri = $_SERVER['BASE_URI'];
// dump($baseUri);

$router->setBasePath($baseUri);

// Création des routes
    // Pour la home
$router->map(
    'GET',
    '/',
    [
        'controller' => 'Pokedex\Controllers\MainController',
        'action' => 'home'
    ],
    'homeRoute'
);

    // Pour la page d'un seul pokemon
$router->map(
    'GET',
    '/pokemon/[i:id]',
    [
        'controller' => 'Pokedex\Controllers\PokemonController',
        'action' => 'pokemon'
    ],
    'pokemonRoute'
);

$match = $router->match();

if($match) {
    $controllerToUse = $match['target']['controller'];
    
    $methodToUse = $match['target']['action'];
    
    $controller = new $controllerToUse($baseUri, $router);

    $dataForPage = [];

    if(array_key_exists('id', $match['params'])) {
        $dataForPage['id'] = $match['params']['id'];
    }

    $controller->$methodToUse($dataForPage);
}
else {
    header("HTTP/1.0 404 Not found");

    $controller = new Pokedex\Controllers\MainController($baseUri, $router);

    $controller->pageDoesNotExist();
}