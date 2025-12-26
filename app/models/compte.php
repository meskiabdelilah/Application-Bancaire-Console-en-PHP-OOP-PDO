<?php

abstract class compte extends baseModel {
    protected $numero;
    protected $solde;
    protected $clients_id;
    protected $type;

    public function __construct($numero, $solde, $clients_id)
    {
        parent::__construct();
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
