<?php

namespace mvc\app\Models\Obj;

class Annee
{
    private $_id;
    private $_nom;
    private $_idDecennie;

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

    public function setIdDecennie($idDecennie)
    {
        $idDecennie = (int) $idDecennie;

        if ($idDecennie > 0) {
            $this->_idDecennie = $idDecennie;
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

    public function getIdDecennie()
    {
        return $this->_idDecennie;
    }
}