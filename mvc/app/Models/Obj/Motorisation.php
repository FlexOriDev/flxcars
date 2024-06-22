<?php

namespace mvc\app\Models\Obj;

class Motorisation
{
    private $_id;
    private $_idFiche;
    private $_appelation;
    private $_carburant;
    private $_construction;
    private $_moteur;
    private $_cylindree;
    private $_performance;
    private $_couple;
    private $_zeroToHundred;
    private $_vmax;
    private $_conso;
    private $_carrosserie;
    private $_marche;

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

    public function setIdFiche($idFiche)
    {
        $idFiche = (int)$idFiche;

        if ($idFiche > 0) {
            $this->_idFiche = $idFiche;
        }
    }

    public function setAppelation($appelation)
    {
        if (is_string($appelation)) {
            $this->_appelation = $appelation;
        }
    }

    public function setCarburant($carburant)
    {
        if (is_string($carburant)) {
            $this->_carburant = $carburant;
        }
    }

    public function setIdConstructeur($idConstructeur)
    {
        $idConstructeur = (int)$idConstructeur;

        if ($idConstructeur > 0) {
            $this->_idConstructeur = $idConstructeur;
        }
    }

    public function setConstruction($construction)
    {
        if (is_string($construction)) {
            $this->_construction = $construction;
        }
    }

    public function setMoteur($moteur)
    {
        if (is_string($moteur)) {
            $this->_moteur = $moteur;
        }
    }

    public function setCylindree($cylindree)
    {
        if (is_string($cylindree)) {
            $this->_cylindree = $cylindree;
        }
    }

    public function setPerformance($performance)
    {
        if (is_string($performance)) {
            $this->_performance = $performance;
        }
    }

    public function setCouple($couple)
    {
        if (is_string($couple)) {
            $this->_couple = $couple;
        }
    }

    public function setZeroToHundred($zeroToHundred)
    {
        if (is_string($zeroToHundred)) {
            $this->_zeroToHundred = $zeroToHundred;
        }
    }

    public function setVmax($vmax)
    {
        if (is_string($vmax)) {
            $this->_vmax = $vmax;
        }
    }

    public function setConso($conso)
    {
        if (is_string($conso)) {
            $this->_conso = $conso;
        }
    }

    public function setCarrosserie($carrosserie)
    {
        if (is_string($carrosserie)) {
            $this->_carrosserie = $carrosserie;
        }
    }

    public function setMarche($marche)
    {
        if (is_string($marche)) {
            $this->_marche = $marche;
        }
    }

    // GETTERS
    public function getId()
    {
        return $this->_id;
    }

    public function getIdFiche()
    {
        return $this->_idFiche;
    }

    public function getAppelation()
    {
        return $this->_appelation;
    }

    public function getCarburant()
    {
        return $this->_carburant;
    }

    public function getConstruction()
    {
        return $this->_construction;
    }

    public function getMoteur()
    {
        return $this->_moteur;
    }

    public function getCylindree()
    {
        return $this->_cylindree;
    }

    public function getPerformance()
    {
        return $this->_performance;
    }

    public function getCouple()
    {
        return $this->_couple;
    }

    public function getZeroToHundred()
    {
        return $this->_zeroToHundred;
    }

    public function getVmax()
    {
        return $this->_vmax;
    }

    public function getConso()
    {
        return $this->_conso;
    }

    public function getCarrosserie()
    {
        return $this->_carrosserie;
    }

    public function getMarche()
    {
        return $this->_marche;
    }

}
