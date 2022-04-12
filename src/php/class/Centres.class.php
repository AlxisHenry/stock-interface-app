<?php

class Centres
{

    private $id;
    private $code;
    private $commentaire;
    private $dateCreation;
    private $dateModification;
    private $createUser;
    private $editUser;

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
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * @param mixed $commentaire
     */
    public function setCommentaire($commentaire): void
    {
        $this->commentaire = $commentaire;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @param mixed $dateCreation
     */
    public function setDateCreation($dateCreation): void
    {
        $this->dateCreation = $dateCreation;
    }

    /**
     * @return mixed
     */
    public function getDateModification()
    {
        return $this->dateModification;
    }

    /**
     * @param mixed $dateModification
     */
    public function setDateModification($dateModification): void
    {
        $this->dateModification = $dateModification;
    }

    /**
     * @return mixed
     */
    public function getCreateUser()
    {
        return $this->createUser;
    }

    /**
     * @param mixed $createUser
     */
    public function setCreateUser($createUser): void
    {
        $this->createUser = $createUser;
    }

    /**
     * @return mixed
     */
    public function getEditUser()
    {
        return $this->editUser;
    }

    /**
     * @param mixed $editUser
     */
    public function setEditUser($editUser): void
    {
        $this->editUser = $editUser;
    }

}