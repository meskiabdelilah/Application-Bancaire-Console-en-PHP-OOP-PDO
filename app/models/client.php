<?php
require_once 'baseModel.php';

class client extends baseModel
{
    private $nom;
    private $prenom;
    private $age;
    private $email;

    public function __construct($nom, $prenom, $age, $email)
    {
        parent::__construct();
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
        $this->setEmail($email);
    }
    private function validationEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        if ($this->validationEmail($email)) {
            $this->email = $email;
        } else  echo "your email is not valid   ";
    }

    public function save()
    {
        $stmt = $this->db->prepare("INSERT INTO  clients (nom, prenom, age, email) values (?,?,?,?) ");
        return $stmt->execute([$this->nom, $this->prenom, $this->age, $this->email]);
    }
    public function delete()
    {
        $checkStmt = $this->db->prepare("SELECT count(*) FROM clients INNER JOIN comptes on clients.id = comptes.clients_id WHERE clients.email = ?");
        $checkStmt->execute([$this-> email]);
        $count = $checkStmt->fetchColumn();

        if ($count == 0) {
            $stmt = $this->db->prepare("DELETE FROM clients WHERE email = ?");
            return $stmt->execute([$this->email]);
        } else { echo "Impossible ";
            return false;
            }
    }
    public static function all()
    {
        $db = database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM clients");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function find($email)
    {
        $db = database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM clients WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
