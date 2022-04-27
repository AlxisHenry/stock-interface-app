<?php

class Articles
{
    private mixed $id;
    private mixed $famille;
    private mixed $nom;
    private mixed $quantityStock;
    private mixed $quantityTotal;
    private mixed $quantityGiven;
    private mixed $quantityMin;
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
    public function getQuantityMin(): mixed
    {
        return $this->quantityMin;
    }

    /**
     * @param mixed $quantityMin
     */
    public function setQuantityMin(mixed $quantityMin): void
    {
        $this->quantityMin = $quantityMin;
    }
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

    public function Update(int $family,string $name, string $comment,int $qteMin ,string $code, string $localisation, int $id):void {
        $REQUEST = "UPDATE `articles` SET famille = :family, nom = :name, commentaire = :comment, quantityMin = :qteMin, code = :code, localisation = :localisation, dateModification = (SELECT NOW()), editUser = :editUser WHERE `id` = :id;";
        $QUERY = Connection()->prepare($REQUEST);
        $QUERY->execute([
            'family' => $family,
            'name' => $name,
            'comment' => $comment,
            'qteMin' => $qteMin,
            'code' => $code,
            'localisation' => $localisation,
            'editUser' => Access_OBJECT_($_SESSION['login']['user'], 'username')->getId(),
            'id' => $id
        ]);
        $QUERY->closeCursor();
    }

    public function Insert(int $family, string $name, int $qteStock, int $qteMin, string $comment, string $code, string $localisation):void {
        $REQUEST = "INSERT INTO `articles` (famille, nom, quantityStock, quantityTotal, quantityGiven, quantityMin ,commentaire, code, localisation, dateCreation, dateModification, createUser, editUser) 
        VALUES (:family, :name, :qteStock, :qteTotal, :qteGive,:qteMin ,:comment, :code, :localisation, (SELECT NOW()) , (SELECT NOW()), :createUser,:editUser);";
        $QUERY = Connection()->prepare($REQUEST);
        $QUERY->execute([
            'family' => $family,
            'name' => $name,
            'qteStock' => $qteStock,
            'qteTotal' => $qteStock,
            'qteGive' => 0,
            'qteMin' => $qteMin,
            'comment' => $comment,
            'code' => $code,
            'localisation' => $localisation,
            'createUser' => Access_OBJECT_($_SESSION['login']['user'], 'username')->getId(),
            'editUser' => Access_OBJECT_($_SESSION['login']['user'], 'username')->getId(),
        ]);
        $QUERY->closeCursor();
    }

    public function Delete(int $id) {
        $REQUEST = "DELETE FROM `articles` WHERE id = :id";
        $QUERY = Connection()->prepare($REQUEST);
        $QUERY->execute([
            'id' => $id,
        ]);
        $QUERY->closeCursor();
    }

}