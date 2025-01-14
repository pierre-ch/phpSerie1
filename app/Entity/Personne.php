<?php

namespace Entity;

use App\Models\PersonneModel;
use App\View;

class Personne
{
    private $nom;
    private $prenom;
    private $adresse;
    private $statut;

    // Constructeur
    public function __construct($nom = null, $prenom = null, $adresse = null, $statut = null)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->statut = $statut;
    }

    // Getter et Setter pour nom
    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    // Getter et Setter pour prenom
    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    // Getter et Setter pour adresse
    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    // Getter et Setter pour statut
    public function getStatut()
    {
        return $this->statut;
    }

    public function setStatut($statut)
    {
        $this->statut = $statut;
    }
}