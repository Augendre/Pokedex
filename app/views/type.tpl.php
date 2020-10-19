<?php

$url = $router->generate('typeRoute');

?>

<main>
    <h3 class="types-title ml-3 mb-3" style="margin-top:4em;">Cliquez sur un type pour voir tous les Pokémon de ce type</h3>
    <div class="btn-group d-flex flex-wrap mx-3" role="group" aria-label="types">

<?php foreach ($typeList as $currentType): ?>

    <button type="button" class="btn mx-1 my-1 rounded type-btn-list " style="background-color: #<?= $currentType->getColor(); ?>">
        <a class="type-link-list" style="background-color: #<?= $currentType->getColor(); ?>; padding: 0.5rem 2rem; margin: 1rem; border-radius: 5px;" href="#"><?= $currentType->getName(); ?></a>
    </button>


<?php endforeach; ?>