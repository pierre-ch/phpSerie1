<?php

namespace Controllers;

use Models\PersonneModel;
use Util\View;

class PersonneController
{
    public function list()
    {
        // Instancier le modèle PersonneModel
        $model = new PersonneModel();

        // Récupérer la liste des personnes
        $personnes = $model->getPersonnes();

        // Instancier la vue
        $view = new View();

        // Utiliser la méthode render() pour afficher la vue
        $view->render('Personne/list', ['personnes' => $personnes]);
    }
}