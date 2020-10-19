<?php

namespace Pokedex\Controllers;

use Pokedex\Models\Pokemon;
use Pokedex\Models\Type;

class CoreController
{
    protected $baseUri;
    protected $router;

    public function __construct($baseUri, $router)
    {
        $this->baseUri = $baseUri;
        $this->router = $router;
    }

    public function show($viewName, $viewData = [])
    {
        $baseUri = $this->baseUri;
        $router = $this->router;

        $pokemonModel = new Pokemon();
        $pokemonList = $pokemonModel->findAll();

        $typeModel = new Type();
        $typeToShow = $typeModel->findTypeForPokemon();

        extract($viewData);

        include __DIR__ . '/../views/header.tpl.php';
        include __DIR__ . '/../views/' . $viewName . '.tpl.php';
        include __DIR__ . '/../views/footer.tpl.php';
    }
}