<?php

namespace mvc\app\Models\Obj;

class User
{
    private $_id;
    private $_pseudo;
    private $_prenom;
    private $_nom;
    private $_mail;

    // Constructeur
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    // Hydratation
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // SETTERS
    public function setId($id)
    {
        $id = (int)$id;

        if ($id > 0) {
            $this->_id = $id;
        }
    }

    public function setPseudo($pseudo)
    {
        if (is_string($pseudo)) {
            $this->_pseudo = $pseudo;
        }
    }

    public function setPrenom($prenom)
    {
        if (is_string($prenom)) {
            $this->_prenom = $prenom;
        }
    }

    public function setNom($nom)
    {
        if (is_string($nom)) {
            $this->_nom = $nom;
        }
    }

    public function setMail($mail)
    {
        if (is_string($mail)) {
            $this->_mail = $mail;
        }
    }

    // GETTERS
    public function getId()
    {
        return $this->_id;
    }

    public function getPseudo()
    {
        return $this->_pseudo;
    }

    public function getPrenom()
    {
        return $this->_prenom;
    }

    public function getNom()
    {
        return $this->_nom;
    }

    public function getMail()
    {
        return $this->_mail;
    }

}
