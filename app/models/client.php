<?php

class client
{
    private $nom;
    private $prenom;
    private $age;
    private $email;

    public function __construct($nom, $prenom, $age, $email)
    {
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
}