<?php

$url = $router->generate('homeRoute');

?>

<div class="card-group d-flex justify-content-center mt-5">

<?php 

foreach ($pokemonList as $pokemonModel) :
    
?>

<div class="col-4 mt-5">
    <div class="card text-center border shadow black">
        <img src="<?= $baseUri . "/img" . '/' . $pokemonModel->getNumero() . '.png';?>" class="card-img-top p-4" alt="<?= $pokemonModel->getNom() ?>">
        <div class="card-body">      
        <p class="card-text"><a  class="link" href="<?= $baseUri . '/pokemon/' . $pokemonModel->getId(); ?>">#<?= $pokemonModel->getNumero();?> <?= $pokemonModel->getNom();?></a></p>
        </div>
    </div>
</div>

<?php endforeach; ?>