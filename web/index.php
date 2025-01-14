<?php

$autoloadPath = "../vendor/autoload.php";

if (!file_exists($autoloadPath)) {
    die("Erreur : Le fichier d'autoload '$autoloadPath' est introuvable. Veuillez exécuter 'composer install' pour générer le fichier.");
}

// Charger l'autoloader
require_once $autoloadPath;

use Controllers\PersonneController;
$pController = new PersonneController;
$pController->list();