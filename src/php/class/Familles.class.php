<?php

class Familles
{
    private $id;
    private $nom;
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

    public function Update(string $name, string $comment, int $id):void {
        $REQUEST = "UPDATE `familles` SET nom = :name, commentaire = :comment, dateModification = (SELECT NOW()), editUser = :editUser WHERE `id` = :id;";
        $QUERY = Connection()->prepare($REQUEST);
        $QUERY->execute([
            'name' => $name,
            'comment' => $comment,
            'editUser' => Access_OBJECT_($_SESSION['login']['user'], 'username')->getId(),
            'id' => $id
        ]);
        $QUERY->closeCursor();
    }

    public function Insert(string $name, string $comment):void {
        $REQUEST = "INSERT INTO `familles` (nom, comment, dateCreation, dateModification, createUser, editUser) 
        VALUES (:name, :comment, (SELECT NOW()) , (SELECT NOW()), :createUser,:editUser);";
        $QUERY = Connection()->prepare($REQUEST);
        $QUERY->execute([
            'name' => $name,
            'comment' => $comment,
            'createUser' => Access_OBJECT_($_SESSION['login']['user'], 'username')->getId(),
            'editUser' => Access_OBJECT_($_SESSION['login']['user'], 'username')->getId(),
        ]);
        $QUERY->closeCursor();
    }

    public function Delete(int $id) {
        $REQUEST = "DELETE FROM `familles` WHERE id = :id";
        $QUERY = Connection()->prepare($REQUEST);
        $QUERY->execute([
            'id' => $id,
        ]);
        $QUERY->closeCursor();
    }

}