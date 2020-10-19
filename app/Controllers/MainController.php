<?php

namespace Pokedex\Controllers;

use Pokedex\Models\Pokemon;

class MainController extends CoreController
{
    public function home()
    {
        $pokemonModel = new Pokemon();
        $pokemonList = $pokemonModel->findAll();

        $this->show('home', [
            'pokemonList' => $pokemonList
        ]);
    }

    public function pageDoesNotExist()
    {
        $this->show('404');
    }
}