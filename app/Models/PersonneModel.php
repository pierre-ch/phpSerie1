<?php

namespace Models;

use Entity\Personne;

class PersonneModel
{
    function getPersonnes(){
        return [
            new Personne('n1,p1,a1,s1'),
            new Personne('n2,p2,a2,s2'),
            new Personne('n3,p3,a3,s3'),
        ];
    }

    public function importFromJson(string $filePath): array
    {
        if (!file_exists($filePath)) {
            throw new \Exception("Le fichier JSON n'existe pas : " . $filePath);
        }

        $jsonContent = file_get_contents($filePath);
        $data = json_decode($jsonContent, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception("Erreur de parsing JSON : " . json_last_error_msg());
        }

        $personnes = [];
        foreach ($data as $personData) {
            if (
                isset($personData['nom'], $personData['prenom'], $personData['age'], $personData['sexe'])
            ) {
                $personnes[] = new Personne(
                    sprintf('%s,%s,%s,%s', $personData['nom'], $personData['prenom'], $personData['age'], $personData['sexe'])
                );
            } else {
                throw new \Exception("Données JSON invalides pour une personne : " . json_encode($personData));
            }
        }

        return $personnes;
    }
}