<?php
namespace Pokedex\Controllers;

use Pokedex\Models\Pokemon;
use Pokedex\Models\PokemonType;
use Pokedex\Models\Type;

class TypeController extends CoreController
{
    public function list()
    {
        $typeModel = new Type();

        $typeList = $typeModel->findAll();

        $this->show('type', [
            'typeList' => $typeList
        ]);
    }
}