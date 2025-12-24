<?php

class compteCourant extends compte
{
    public function __construct($numero, $solde, $client_id)
    {
        parent::__construct($numero, $solde, $client_id);
    }

    public function deposer($montant)
    {
        if ($montant > 1) {

            $this->solde += $montant;
            $this->solde -= 1;
        }
    }
    public function retirer($montant)
    {
        if ($this->solde - $montant >= -500) {
            $this->solde -= $montant;
            if ($this->solde - $montant == 0) {
                echo "Attention: Votre solde est maintenant 0.";
            }
        } else echo "Operation impossible : Limite de découvert atteinte !";
    }
}
