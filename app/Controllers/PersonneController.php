<?php

namespace Controllers;

use Models\PersonneModel;
use Util\View;
use phputil\JSON;
class PersonneController
{
    public static function list()
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

    public static function exportJSON()
    {
        // Instancier le modèle PersonneModel
        $model = new PersonneModel();

        // Récupérer la liste des personnes
        $personnes = $model->getPersonnes();

        // Convertir les données en JSON en utilisant le package phputil/JSON
        $jsonData = JSON::encode($personnes);

        // Définir les en-têtes HTTP pour le téléchargement du fichier JSON
        header('Content-Type: application/json');
        header('Content-Disposition: attachment; filename="personnes.json"');

        // Envoyer le contenu JSON
        echo $jsonData;
    }

}