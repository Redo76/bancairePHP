<?php

require_once('Compte.php');

class Personne{

    protected string $nom;
    protected string $prenom;
    protected string $adresse;
    private array $comptes = array();


    public function __construct($n, $p, $a){
        $this->nom = $n;
        $this->prenom = $p;
        $this->adresse = $a;
    }

    public function setComptes($comptes){
        $this->comptes = $comptes;
    }

    public function getComptes(){
        return $this->comptes;
    }

    public function addCompte($compte){
        array_push($this->comptes, $compte);
    }

    public function getNomComplet(){
        return $this->nom . " " . $this->prenom;
    }
}

