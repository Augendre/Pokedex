<?php

namespace Pokedex\Models;

use Pokedex\Utils\Database;
use PDO;

class Pokemon extends CoreModel
{
    private $nom;
    private $pv;
    private $attaque;
    private $defense;
    private $attaque_spe;
    private $defense_spe;
    private $vitesse;
    private $numero;

    //cette propriété stocke les Types (attention ce sont des instance de classe Type() - Models/Type.php)
    private $types = [];

    public function addType($type)
    {
        $this->types[] = $type;
    }


    public function getTypes()
    {
        return $this->types;
    }


    public function findAll()
    {
        $sql = "
        SELECT *
        FROM `pokemon`
        ORDER BY `numero` ASC";

        $pdo = Database::getPDO();
        $statement = $pdo->query($sql);
        $pokemonList = $statement->fetchAll(PDO::FETCH_CLASS, 'Pokedex\Models\Pokemon');
        return $pokemonList;
    }

    public function find($id)
    {
        $sql = "
            SELECT
                pokemon.id as pokemon_id,
                pokemon.nom as pokemon_nom,
                pokemon.pv as  pokemon_pv,
                pokemon.attaque as pokemon_attaque,
                pokemon.defense as pokemon_defense,
                pokemon.attaque_spe as  pokemon_attaque_spe,
                pokemon.defense_spe as pokemon_defense_spe,
                pokemon.vitesse as pokemon_vitesse,
                pokemon.numero as pokemon_numero,

                type.id as type_id,
                type.name as type_name,
                type.color as type_color

            FROM `pokemon`

            INNER JOIN `pokemon_type`
                ON `pokemon`.`numero` = `pokemon_type`.`pokemon_numero`
                
            INNER JOIN `type`
                ON `pokemon_type`.`type_id` = `type`.`id`

            WHERE `pokemon`.`id` = " . $id;

        $pdo = Database::getPDO();
        $statement = $pdo->query($sql);


        $resultats = $statement->fetchAll();


        /*
        dump($resultats);
        echo '<hr/>';
        echo '<hr/>';
        */

        $pokemon = new Pokemon();

        foreach($resultats as $ligne) {
            //a chaque tour de boucle nous renseignons les informations du pokemon
            //ce n'est pas génant car pour toutes les lignes de résulat de la requête sql (voir $sql), les informations concernant le pokemon sont identique
            //dump($ligne); pour constater que les info du pokemon ne changent pas
            $pokemon->setId($ligne['pokemon_id']);
            $pokemon->setNom($ligne['pokemon_nom']);
            $pokemon->setPv($ligne['pokemon_pv']);
            $pokemon->setAttaque($ligne['pokemon_attaque']);
            $pokemon->setDefense($ligne['pokemon_defense']);
            $pokemon->setAttaque_spe($ligne['pokemon_attaque_spe']);
            $pokemon->setDefense_spe($ligne['pokemon_defense_spe']);
            $pokemon->setVitesse($ligne['pokemon_vitesse']);
            $pokemon->setNumero($ligne['pokemon_numero']);


            //a chaque tour de boucle, les informations du type changent
            //c'est à cause de ceci que nous souhaitons créer un objet type à chaque "ligne de résultat"
            $type = new Type();
            $type->setId($ligne['type_id']);
            $type->setName($ligne['type_name']);
            $type->setColor($ligne['type_color']);

            //A chaque tour de boucle je souhaite ajouter le type au pokemon
            //le type est dans la variable $type
                //pour voir le type ; faire dump($type)
            //le pokemon est dans la variable $pokemon
                //pour voir le pokemon ; faire dump($pokemon)
            //la méthode addType ajoute un Type (objet type) à un pokemon
            //les types sont stockés dans la propriété $types (voir la déclaration des propriétés de la classe +- ligne 19)

            $pokemon->addType($type); 

            //dump($ligne);
            /*
            dump($type);
            dump($pokemon);
            
            echo '<hr/>';
            echo '<hr/>';
            */

        }

        //$pokemonChoose = $statement->fetchAll(PDO::FETCH_CLASS, 'Pokedex\Models\Pokemon');

        //dump($pokemonChoose);
        return $pokemon;

    }

    
    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Get the value of pv
     */ 
    public function getPv()
    {
        return $this->pv;
    }

    /**
     * Get the value of attaque
     */ 
    public function getAttaque()
    {
        return $this->attaque;
    }

    /**
     * Get the value of defense
     */ 
    public function getDefense()
    {
        return $this->defense;
    }

    /**
     * Get the value of attaque_spe
     */ 
    public function getAttaque_spe()
    {
        return $this->attaque_spe;
    }

    /**
     * Get the value of defense_spe
     */ 
    public function getDefense_spe()
    {
        return $this->defense_spe;
    }

    /**
     * Get the value of vitesse
     */ 
    public function getVitesse()
    {
        return $this->vitesse;
    }

    /**
     * Get the value of numero
     */ 
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Set the value of pv
     *
     * @return  self
     */ 
    public function setPv($pv)
    {
        $this->pv = $pv;

        return $this;
    }

    /**
     * Set the value of attaque
     *
     * @return  self
     */ 
    public function setAttaque($attaque)
    {
        $this->attaque = $attaque;

        return $this;
    }

    /**
     * Set the value of defense
     *
     * @return  self
     */ 
    public function setDefense($defense)
    {
        $this->defense = $defense;

        return $this;
    }

    /**
     * Set the value of attaque_spe
     *
     * @return  self
     */ 
    public function setAttaque_spe($attaque_spe)
    {
        $this->attaque_spe = $attaque_spe;

        return $this;
    }

    /**
     * Set the value of defense_spe
     *
     * @return  self
     */ 
    public function setDefense_spe($defense_spe)
    {
        $this->defense_spe = $defense_spe;

        return $this;
    }

    /**
     * Set the value of vitesse
     *
     * @return  self
     */ 
    public function setVitesse($vitesse)
    {
        $this->vitesse = $vitesse;

        return $this;
    }

    /**
     * Set the value of numero
     *
     * @return  self
     */ 
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }
}