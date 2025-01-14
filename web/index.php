<?php
require_once "../files_to_include.php";
use Controllers\PersonneController;
$pController = new PersonneController;
$pController->list();