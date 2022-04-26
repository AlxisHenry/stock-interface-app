<?php

class Articles
{
    private mixed $id;
    private mixed $famille;
    private mixed $nom;
    private mixed $quantityStock;
    private mixed $quantityTotal;
    private mixed $quantityGiven;
    private mixed $commentaire;
    private mixed $code;
    private mixed $localisation;
    private mixed $dateCreation;
    private mixed $dateModification;
    private mixed $createUser;
    private mixed $editUser;

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
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * @param mixed $famille
     */
    public function setFamille($famille): void
    {
        $this->famille = $famille;
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
    public function getQuantityStock()
    {
        return $this->quantityStock;
    }

    /**
     * @param mixed $quantityStock
     */
    public function setQuantityStock($quantityStock): void
    {
        $this->quantityStock = $quantityStock;
    }

    /**
     * @return mixed
     */
    public function getQuantityTotal()
    {
        return $this->quantityTotal;
    }

    /**
     * @param mixed $quantityTotal
     */
    public function setQuantityTotal($quantityTotal): void
    {
        $this->quantityTotal = $quantityTotal;
    }

    /**
     * @return mixed
     */
    public function getQuantityGiven()
    {
        return $this->quantityGiven;
    }

    /**
     * @param mixed $quantityGiven
     */
    public function setQuantityGiven($quantityGiven): void
    {
        $this->quantityGiven = $quantityGiven;
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
    public function getLocalisation()
    {
        return $this->localisation;
    }

    /**
     * @param mixed $localisation
     */
    public function setLocalisation($localisation): void
    {
        $this->localisation = $localisation;
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

    public function Update() {

    }

    public function Insert($family, $name, $qteStock, $comment, $code, $localisation) {
        $REQUEST = "INSERT INTO `articles` (famille, nom, quantityStock, quantityTotal, quantityGiven, commentaire, code, localisation, dateCreation, dateModification, createUser, editUser) 
VALUES (:family, :name, :qteStock, :qteTotal, :qteGive, :comment, :code, :localisation, (SELECT NOW()) , (SELECT NOW()), :createUser,:editUser);";
        $QUERY = Connection()->prepare($REQUEST);
        $QUERY->execute([
            ':family' => $family,
            ':name' => $name,
            ':qteStock' => $qteStock,
            ':qteTotal' => $qteStock,
            ':qteGive' => 0,
            ':comment' => $comment,
            ':code' => $code,
            ':localisation' => $localisation,
            ':createUser' => $_SESSION['login']['user'],
            ':editUser' => $_SESSION['login']['user'],
        ]);
        $QUERY->closeCursor();
    }

    public function Delete() {

    }

}