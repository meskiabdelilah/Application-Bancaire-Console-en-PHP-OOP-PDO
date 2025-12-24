<?php

class compteEpargne extends compte {
    public function __construct($numero, $solde, $client_id)
    {
        parent::__construct($numero, $solde, $client_id);
    }

    public function deposer($montant)
    {
        if ($montant > 1) {
            $this->solde += $montant;
        }
    }
    public function retirer($montant)
    {
        if ($this->solde - $montant >= 0) {
            $this->solde -= $montant;

        } else echo "Operation impossible : Solde insuffisant (Le solde ne peut pas être inférieur à 0).";
    }
}