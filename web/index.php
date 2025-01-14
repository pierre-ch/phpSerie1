<?php
require_once "../vendor/autoload.php";
use Controllers\PersonneController;
$pController = new PersonneController;
$pController->list();