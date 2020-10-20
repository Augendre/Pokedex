<?php

namespace Pokedex\Models;

use Pokedex\Utils\Database;
use PDO;

class Type extends CoreModel
{
    private $name;
    private $color;

    // propriété stockant les Pokemons (instance de la class Pokemon)
    private $pokemons = [];

    public function addPokemon($pokemon)
    {
        $this->pokemons[] = $pokemon;
    }
    
    public function getPokemons()
    {
        return $this->pokemons;
    }
    
    public function findAll()
    {
        $sql = "
        SELECT *
        FROM `type`
        ORDER BY `id` ASC
        ";
        
        $pdo = Database::getPDO();
        $statement = $pdo->query($sql);
        $typeList = $statement->fetchAll(PDO::FETCH_CLASS, 'Pokedex\Models\Type');
        
        return $typeList;
    }
    
    public function findType($id)
    {
        $sql = "
        SELECT
        type.id as type_id,
        type.name as type_name,
        type.color as type_color,

        pokemon.id as pokemon_id,
        pokemon.nom as pokemon_nom,
        pokemon.numero as pokemon_numero

        FROM `type`

        INNER JOIN `pokemon_type`
        ON `type`.`id` = `pokemon_type`.`type_id`

        INNER JOIN `pokemon`
        ON `pokemon`.`numero` =  `pokemon_type`.`pokemon_numero`

        WHERE `type`.`id` = " . $id;

        $pdo = Database::getPDO();
        $statement = $pdo->query($sql);

        $results = $statement->fetchAll();

        return $results;
    }
    
    public function findTypeForPokemon()
    {
        // Instanciation de l'objet PDO() pour se connecter à la DB
        $pdo = Database::getPDO();

        // Requête SQL
        $sql = "
        SELECT *
        FROM `type`
        ";

        // Exécution de la requête SQL
        $pdoStatement = $pdo->query($sql);

        // N'est attendu qu'une réponse => fecthObject
        $object = $pdoStatement->fetchObject('\Pokedex\Models\Type');

        // On retourne l'objet
        return $object;
    }

    // =======================
        /* Guetters and Setters */
    // =======================
    
    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of color
     */ 
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */ 
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }
}