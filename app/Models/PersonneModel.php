<?php

namespace Models;

use Entity\Personne;

class PersonneModel
{
    function getPersonnes()
    {
        // Spécifiez le chemin vers votre fichier JSON
        $filePath = '../personnes.json';

        // Vérifiez si le fichier existe
        if (!file_exists($filePath)) {
            throw new \Exception("Le fichier personnes.json est introuvable.");
        }

        // Lire et décoder le fichier JSON
        $jsonData = file_get_contents($filePath);
        $personnesData = json_decode($jsonData, true);

        if ($personnesData === null) {
            throw new \Exception("Échec du décodage JSON : " . json_last_error_msg());
        }

        // Convertir les données en objets Personne
        $personnes = [];
        foreach ($personnesData as $data) {
            $personnes[] = new Personne(
                $data['nom'],
                $data['prenom'],
                $data['age'],
                $data['sexe']
            );
        }

        return $personnes;
    }
}