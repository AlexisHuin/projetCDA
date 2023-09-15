<!DOCTYPE html>
<html lang="fr">

<head>
<script src="../app.js"></script>
    <link rel="stylesheet" href="./assets/css/stylesheet.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $titre?> </title>
</head>

<body>
    <header>
        <div class="logo"><a class="accueil_a" href="/Testing/ProjetCDARentree/"><img src="./assets/img/logo.png" alt="logo coopérative"><p class="accueil">Accueil</p></a>
     </div>
        <nav>
        <div class="menu">
            <div class="menu-button">Ajouter</div>
            <div class="menu-options">
                <a href="/Testing/ProjetCDARentree/addTypeProduct.php">Type de produit</a>
                <a href="/Testing/ProjetCDARentree/addProduct">produit</a>
                <a href="/Testing/ProjetCDARentree/addSeason">Saison</a>
                <a href="/Testing/ProjetCDARentree/addProductor">Producteur</a>
            </div>
        </div>
        <a class="nav_lien" href="/Testing/ProjetCDARentree/producttype.php">Type de produit</a>
            <a class="nav_lien" href="/Testing/ProjetCDARentree/season.php">Saison</a>
            <a class="nav_lien" href="/Testing/ProjetCDARentree/product.php">produit</a>
            <a class="nav_lien" href="/Testing/ProjetCDARentree/producteur.php">Producteur</a>
            <a class="nav_lien" href="/Testing/ProjetCDARentree/about.php">A propos</a>
        </nav>
    </header>