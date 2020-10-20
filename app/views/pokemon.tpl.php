<?php

// route correspondante
$url = $router->generate('pokemonRoute');

// Retour à la page précédente en PHP (idéalement en JS pour éviter le pb de cache)
if(isset($_SERVER['HTTP_REFERER'])) { 
    $previous = $_SERVER['HTTP_REFERER']; 
}

?>

<div class="card-body title-details d-flex justify-content-center">
    <h3 class="details-title">Détails de <?= $pokemonChoose->getNom();?></h3>
</div>
<div class="d-flex justify-content-center">
    <div class="col-md-4 img-box">
        <img src="<?= $baseUri . '/img/' . $pokemonChoose->getNumero() . '.png';?>" class="card-img-top" alt="...">
    </div>
    <div class="card col-md-6 type-card">
        <div class="card-body">
            <h4 class="card-text title-name"><?= '#' . $pokemonChoose->getNumero() .' ' . $pokemonChoose->getNom(); ?></h4>
            <div class="btn-group" role="group" aria-label="types">
            <?php 
                $types = $pokemonChoose->getTypes();

                foreach($types as $currentType): ?>
                    <div class= "btn" style="background-color: <?= $currentType->getColor(); ?>">
                        <a class="type-link" style="background-color: #<?= $currentType->getColor(); ?>; padding: 0.5rem 2rem; margin: 1rem; border-radius: 5px" href=""><?= $currentType->getName(); ?></a>
                    </div>
            <?php endforeach ?>
            </div>
            <h5 class="mt-3">Statistiques</h5>
            <table class="table table-borderless table-sm">                        
                <tbody>
                    <tr>
                        <th scope="row" class="col1">PV</th>
                        <td class="col2"><?= $pokemonChoose->getPv() ;?></td>
                        <td class="col3">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: <?= (100*$pokemonChoose->getPv()/255) ?>%;background-color:#EFE3E3" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>    
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="col1">Attaque</th>
                        <td class="col2"><?= $pokemonChoose->getAttaque() ;?></td>
                        <td class="col3"
                        <td>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: <?= (100*$pokemonChoose->getAttaque()/255) ?>%; background-color:#EFE3E3" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>    
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="col1">Défense</th>
                        <td class="col2"><?= $pokemonChoose->getDefense() ;?></td>
                        <td class="col3"
                        <td>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: <?= (100*$pokemonChoose->getDefense()/255) ?>%;background-color:#EFE3E3" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>    
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="col1">Attaque Spé.</th>
                        <td class="col2"><?= $pokemonChoose->getAttaque_spe() ;?></td>
                        <td class="col3"
                        <td>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: <?= (100*$pokemonChoose->getAttaque_spe()/255) ?>%;background-color:#EFE3E3" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>    
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="col1">Défense Spé.</th>
                        <td class="col2"><?= $pokemonChoose->getDefense_spe() ;?></td>
                        <td class="col3"
                        <td>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: <?= (100*$pokemonChoose->getDefense_spe()/255) ?>%;background-color:#EFE3E3" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>    
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="col1">Vitesse</th>
                        <td class="col2"><?= $pokemonChoose->getVitesse() ;?></td>
                        <td class="col3"
                        <td>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: <?= (100*$pokemonChoose->getVitesse()/255) ?>%;background-color:#EFE3E3" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>    
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="card-body return-link-card d-flex justify-content-center">
        <a class="return-link" href="<?= $previous; ?> ">Revenir à la liste</a>
</div>


