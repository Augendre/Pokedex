<!DOCTYPE html>
<html ng-app="pokedex">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= $baseUri; ?>/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Trade+Winds&display=swap" rel="stylesheet">   
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light mx-3 my-3 fixed-top mynav">
            <a class=" my-nav-link title" href="<?= $baseUri; ?>">Pokédex</a>
            <div class="" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link my-nav-link" href="<?= $baseUri; ?>">Liste</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link my-nav-link" href="<?= $baseUri; ?>/type">Types</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>