<?php

// route correspondante
$url = $router->generate('typeRoute');

?>

<div class="card-group d-flex justify-content-center">

<?php 

// Si $pokemonList n'est pas vide alors on peut afficher les données
if (!empty($pokemonTypeList)) :
    foreach ($pokemonTypeList as $currentPokemon => $value) :

?>

<div class="col-4 mb-4">
    <div class="card text-center border shadow black">
        <img src="<?= $baseUri . "/img" . '/' . $value['pokemon_numero'] . '.png';?>" class="card-img-top p-4" alt="<?= $value['pokemon_nom'] ?>">
        <div class="card-body">      
        <p class="card-text"><a  class="link" href="<?= $baseUri . '/pokemon/' . $value['pokemon_id']; ?>">#<?= $value['pokemon_numero']; ?> <?= $value['pokemon_nom']; ?></a></p>
        </div>
    </div>
</div>

<?php

endforeach; 

// Sinon message indicatif de l'absence de pokémon et lien vers la page des types
else :

?>

<div class="no-pok">
    <p class="no-pok-content">Actuellement, aucun Pokemon n'appartient à ce type</p>
    <a class="back-type-list" href="<?= $baseUri . '/type'; ?>">Retour aux Types</a>
</div>

<?php endif; ?>
