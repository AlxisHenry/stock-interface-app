<?php

class Access
{

    private $id;
    private $username;
    private $password;
    private $type;
    private $derniereConnection;
    private $status;
    private $commentaire;
    private $dateCreation;
    private $dateModification;
    private $CreateUser;
    private $EditUser;

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
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getDerniereConnection()
    {
        return $this->derniereConnection;
    }

    /**
     * @param mixed $derniereConnection
     */
    public function setDerniereConnection($derniereConnection): void
    {
        $this->derniereConnection = $derniereConnection;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
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
        return $this->CreateUser;
    }

    /**
     * @param mixed $CreateUser
     */
    public function setCreateUser($CreateUser): void
    {
        $this->CreateUser = $CreateUser;
    }

    /**
     * @return mixed
     */
    public function getEditUser()
    {
        return $this->EditUser;
    }

    /**
     * @param mixed $EditUser
     */
    public function setEditUser($EditUser): void
    {
        $this->EditUser = $EditUser;
    }

    public function Update(string $username, string $pwd, string $type, $derniereConnection, string $commentaire, int $editUser, int $id) {
        $REQUEST = 'UPDATE `access` SET username = :username, password = :pwd, type = :type, derniereConnection = :derniereConnection, commentaire = :commentaire, dateModification = (SELECT NOW()), editUser = :editUser WHERE `id` = :id';
        $QUERY = Connection()->prepare($REQUEST);
        $QUERY->execute([
            'username' => $username,
            'pwd' => $pwd,
            'type' => $type,
            'derniereConnection' => $derniereConnection,
            'commentaire' => $commentaire,
            'editUser' => $editUser,
            'id' => $id
        ]);
        $QUERY->closeCursor();
    }

    public function UpdatePassword(string $password,int $editUser,int $user) {
        $REQUEST = 'UPDATE `access` SET password = :pwd, dateModification = (SELECT NOW()), editUser = :editUser WHERE `id` = :id';
        $QUERY = Connection()->prepare($REQUEST);
        $QUERY->execute([
            'pwd' => $password,
            'editUser' => $editUser,
            'id' => $user
        ]);
        $QUERY->closeCursor();
    }

    public function UpdateLastConnectionTime(string $datetime, int $id) {
        $REQUEST = 'UPDATE `access` SET derniereConnection = :derniereConnection WHERE `id` = :id';
        $QUERY = Connection()->prepare($REQUEST);
        $QUERY->execute([
            'derniereConnection' => $datetime,
            'id' => $id
        ]);
        $QUERY->closeCursor();
    }

}