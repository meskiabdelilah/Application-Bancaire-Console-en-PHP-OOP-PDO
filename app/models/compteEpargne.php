<?php

class compteEpargne extends compte
{
    public function __construct($numero, $solde, $clients_id, $type)
    {
        parent::__construct($numero, $solde, $clients_id);
        $this->numero = $numero;
        $this->solde = $solde;
        $this->clients_id = $clients_id;
        $this->type = $type;
    }

    public function deposer($montant)
    {
        if ($montant > 1) {
            $this->solde += $montant;
        }
        $stmt = $this->db->prepare("UPDATE comptes set solde = ? where  clients_id = ? ");
        return $stmt->execute([$this->solde, $this->clients_id]);
    }
    public function retirer($montant)
    {
        if ($this->solde - $montant >= 0) {
            $this->solde -= $montant;
        } else echo "Operation impossible : Solde insuffisant (Le solde ne peut pas être inférieur à 0).";
        $stmt = $this->db->prepare("UPDATE comptes set solde = ? where  clients_id = ? ");
    return $stmt->execute([$this->solde, $this->clients_id]);
    }
    public function save()
    {
        $stmt = $this->db->prepare("INSERT INTO  comptes (numero, solde, clients_id,type) values (?,?,?,?) ");
        return $stmt->execute([$this->numero, $this->solde, $this->clients_id, $this->type]);
    }
    public function delete()
    {
        if ($this->solde != 0) {
            echo "Impossible";
            return false;
        }
        $stmt = $this->db->prepare("DELETE FROM comptes WHERE numero = ?");
        $result = $stmt->execute([$this->numero]);
        if ($result) {
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
