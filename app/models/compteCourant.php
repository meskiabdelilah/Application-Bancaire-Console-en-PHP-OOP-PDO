<?php

class compteCourant extends compte
{
    public function __construct($numero, $solde, $clients_id)
    {
        parent::__construct($numero, $solde, $clients_id);
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
    public function save()
    {
        $stmt = $this->db->prepare("INSERT INTO  comptes (numero, solde, clients_id) values (?,?,?) ");
        return $stmt->execute([$this->numero, $this->solde, $this->clients_id]);
    }
    public function delete()
    {
        if($this-> solde != 0){
            echo "Impossible";
            return false;
        }
            $stmt = $this->db->prepare("DELETE FROM comptes WHERE numero = ?");
            $result = $stmt->execute([$this->numero]);
        if($result){
            echo "valid ";
            return true;
        }
        return false;
    }
    public static function all()
    {
        $db = database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM comptes");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function find($numero)
    {
        $db = database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM comptes WHERE numero = ?");
        $stmt->execute([$numero]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
