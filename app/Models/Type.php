<?php

namespace Pokedex\Models;

use Pokedex\Utils\Database;
use PDO;

class Type extends CoreModel
{
    private $name;
    private $color;

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