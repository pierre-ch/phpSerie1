<?php
require_once "../app/Entity/Personne.php";
require_once "../app/Models/PersonneModel.php";
require_once "../app/Controllers/PersonneController.php";
use Controllers\PersonneController;
$pController = new PersonneController;
$pController->list();