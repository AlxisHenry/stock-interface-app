<?php

namespace Utilisateurs;

class Utilisateurs
{
    private $id;
    private $nom;
    private $centreDeCout;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getCentreDeCout()
    {
        return $this->centreDeCout;
    }

    /**
     * @param mixed $centreDeCout
     */
    public function setCentreDeCout($centreDeCout): void
    {
        $this->centreDeCout = $centreDeCout;
    }

}