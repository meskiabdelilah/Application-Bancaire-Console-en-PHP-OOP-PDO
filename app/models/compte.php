<?php

abstract class compte extends baseModel {
    protected $numero;
    protected $solde;
    protected $clients_id;

    public function __construct($numero, $solde, $clients_id)
    {
        $this->numero = $numero;
        $this->solde = $solde;
        $this->clients_id = $clients_id;
    }
    abstract public function deposer($montant);
    abstract public function retirer($montant);
 
    public function getSolde(){
        return $this-> solde ;
    }
}
