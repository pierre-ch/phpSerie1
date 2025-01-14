<?php

namespace Controllers;

class PersonneController
{
    public function list()
    {
        // Instancier le modèle PersonneModel
        $model = new PersonneModel();

        // Récupérer la liste des personnes
        $personnes = $model->getPersonnes();

        // Afficher les données via la méthode render() de la classe View
        $view = new View();
        $view->render('personnes/list', ['personnes' => $personnes]);
    }
}