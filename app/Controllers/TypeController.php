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

        $this->show('types', [
            'typeList' => $typeList
        ]);
    }

    public function typeList($params = [])
    {
        $typeId = $params['id'];

        $typeModel = new Type();
        $pokemonTypeList = $typeModel->findType($typeId);

        $this->show('type', [
            'id' => $typeId,
            'pokemonTypeList' => $pokemonTypeList
        ]);
    }
}