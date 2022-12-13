<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, inactal-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>MMI Castres - Cours de PHP</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="design.css"> 
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="?">A quoi on Joue ?</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="?action=liste">Liste</a>
        <a class="nav-link" href="?action=ajout">Ajouter</a>
        <a class="nav-link" href="?action=modif">Modifier</a>
        <a class="nav-link" href="?action=suppr">Supprimer</a>
        <a class="nav-link" href="?action=recher">Rechercher</a>
      </div>
    </div>
  </div>
</nav>
<div class="container">


<?php
require "moteurtemplate.php";
include "connect.php";
include "Controllers/jeuController.php";

$jeuController = new JeuController($bdd, $twig);

// liste des acts dans un tableau HTML
//  https://.../index/php?action=liste
if (isset($_GET["action"]) && $_GET["action"]=="liste") {
  $jeuController->listejeu();
}

// formulaire ajout d'un Acteurice : saisie des caractéristiques à ajouter dans la BD
//  https://.../index/php?action=ajout
// version 0 : l'Acteurice est rattaché automatiquement à un membre déjà présent dans la BD
if (isset($_GET["action"]) && $_GET["action"]=="ajout") {
  $jeuController->formAjoutjeu();
 }

// ajout de l'Acteurice dans la base
// --> au clic sur le bouton "valider_ajout" du form précédent
if (isset($_POST["valider_ajout"])) {
  $jeuController->ajoutjeu();
}


// suppression d'un Acteurice : choix de l'Acteurice
//  https://.../index/php?action=suppr
if (isset($_GET["action"]) && $_GET["action"]=="suppr") { 
  $actController->choixSuppActeurice();
}

// supression d'un Acteurice dans la base
// --> au clic sur le bouton "valider_supp" du form précédent
if (isset($_POST["valider_supp"])) { 
  $actController->suppActeurice();
}

// modification d'un Acteurice : choix de l'Acteurice
//  https://.../index/php?action=modif
if (isset($_GET["action"]) && $_GET["action"]=="modif") { 
  $actController->choixModActeurice();
}

// modification d'un Acteurice : saisie des nouvelles valeurs
// --> au clic sur le bouton "saisie modif" du form précédent
//  ==> version 0 : pas modif de l'idact ni de l'idmembre
if (isset($_POST["saisie_modif"])) {   
  $actController->saisieModActeurice();
}

//modification d'un Acteurice : enregistrement dans la bd
// --> au clic sur le bouton "valider_modif" du form précédent
if (isset($_POST["valider_modif"])) {
  $actController->modActeurice();
}


// recherche d'Acteurice : saisie des critres de recherche dans un formulaire
//  https://.../index/php?action=recherc
if (isset($_GET["action"]) && $_GET["action"]=="recher") {
  $actController->formRechercheActeurice();
}

// recherche des Acteurices : construction de la requete SQL en fonction des critères 
// de recherche et affichage du résultat dans un tableau HTML 
// --> au clic sur le bouton "valider_recher" du form précédent
if (isset($_POST["valider_recher"])) { 
  $actController->rechercheActeurice();
}

?>
  </div>	
  <footer> Copyright &copy; <a href="index.php">MMI Castres</a> - Tous droits réservés</footer>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>