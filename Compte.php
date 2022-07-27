<?php

require_once('Compte.php');

class Compte{

    protected Personne $titulaire;
    protected static $count = 0;
    private $number;
    protected float $solde;
    protected int $maxDecouvert;
    protected int $maxDebit;

    public function __construct($titulaire, $maxDebit = 800 , $maxDec = 1000, $solde = 0 ) {
        self::$count++;
        $this->number=self::$count;
        $this->titulaire = $titulaire;
        $this->solde = $solde;
        ($maxDec < 0) ? $this->maxDecouvert = $maxDec : $this->maxDecouvert = -$maxDec;
        $this->maxDebit = $maxDebit;
    }

    public function getNumber(){
        return $this->number;
    }

    public function setTitulaire($personne){
        $this->titulaire = $personne;
    }

    public function getTitulaire(){
        return $this->titulaire;
    }
    public function getSolde(){
        return $this->solde;
    }


    public function deposit($amount){
        $this->solde += $amount;
        return $this->solde;
    }

    public function withdrawal($amount){
        if ($amount > $this->maxDebit) {
            return false;
        }
        else {
            $newSolde = $this->solde - $amount;
            if ($newSolde < $this->maxDecouvert) {
                return false;
            } else{
                $this->solde = $newSolde;
                return $this->solde;
            } 
        }
    }

    public function isDecouvert(){
        if ($this->solde < 0) {
            return "Oui";
        }
        else{
            return "Non";
        }
    }

    public function setMaxDecouvert($value){
        ($value < 0) ? $this->maxDecouvert = $value : $this->maxDecouvert = -$value;
    }

    public function getMaxDecouvert(){
        return $this->maxDecouvert;
    }

    public function setMaxDebit($value){
        $this->maxDebit = $value;
    }

    public function getMaxDebit(){
        return $this->maxDebit;
    }
}

