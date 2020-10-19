<?php

namespace Pokedex\Controllers;

use Pokedex\Models\Pokemon;
use Pokedex\Models\PokemonType;
use Pokedex\Models\Type;

class PokemonController extends CoreController
{
    public function pokemon($params = [])
    {
        $pokemonNumber = $params['id'];

        $pokemonModel = new Pokemon();
        $pokemonChoose = $pokemonModel->find($pokemonNumber);

        $typeModel = new Type();
        $typeForView = $typeModel->findTypeForPokemon();

        $this->show('pokemon',[
            'id' => $pokemonNumber,
            'pokemonChoose' => $pokemonChoose,
            'typeForView' => $typeForView
        ]);
    }
}