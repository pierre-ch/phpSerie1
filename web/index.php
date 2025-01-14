<?php
require_once "../app/Entity/Personne.php";
require_once "../app/Models/PersonneModel.php";
require_once "../app/Controllers/PersonneController.php";
require_once "../util/View.php";
use Controllers\PersonneController;
$pController = new PersonneController;
$pController->list();