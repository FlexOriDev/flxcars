<?php

namespace mvc\app\Models\Obj;

class Constructeur
{
    private $_id;
    private $_nom;
    private $_image;
    private $_idPays;
    private $_idGroupe;

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

    public function setNom($nom)
    {
        if (is_string($nom)) {
            $this->_nom = $nom;
        }
    }

    public function setImage($_image)
    {
        if (is_string($_image)) {
            $this->_image = $_image;
        }
    }

    public function setIdPays($idPays)
    {
        $idPays = (int)$idPays;

        if ($idPays > 0) {
            $this->_idPays = $idPays;
        }
    }

    public function setIdGroupe($idGroupe)
    {
        $idGroupe = (int)$idGroupe;

        if ($idGroupe > 0) {
            $this->_idGroupe = $idGroupe;
        }
    }

    // GETTERS
    public function getId()
    {
        return $this->_id;
    }

    public function getNom()
    {
        return $this->_nom;
    }

    public function getImage()
    {
        return $this->_image;
    }

    public function getIdPays()
    {
        return $this->_idPays;
    }

    public function getIdGroupe()
    {
        return $this->_idGroupe;
    }
}
