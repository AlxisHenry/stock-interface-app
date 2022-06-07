<?php

class Mouvements
{
    private $id;
    private $dateMouvement;
    private $creator;
    private $type;
    private $order;
    private $quantite;
    private $article;
    private $users;
    private $centreDeCout;
    private $commentaire;
    private $dateCreation;
    private $dateModification;
    private $createUser;
    private $editUser;

    public function New(string $type, string $order, int $qte, int $article, int $users, string $centreDeCout, string $commentaire):void {
        $REQUEST = "INSERT INTO `mouvements` (dateMouvement, creator, type, orderNumber, quantite, article, users, centreDeCout, commentaire, dateCreation, dateModification, createUser, editUser) VALUES ((SELECT NOW()), :creator, :type, :orderNumber, :qte ,:article ,:users, :centreDeCout, :commentaire, (SELECT NOW()) , (SELECT NOW()), :createUser,:editUser);";
        $QUERY = Connection()->prepare($REQUEST);
        $QUERY->execute([
            'creator' => Access_OBJECT_($_SESSION['login']['user'], 'username')->getId(),
            'type' => $type,
            'orderNumber' => $order,
            'qte' => $qte,
            'article' => $article,
            'users' => $users,
            'centreDeCout' => $centreDeCout,
            'commentaire' => $commentaire,
            'createUser' => Access_OBJECT_($_SESSION['login']['user'], 'username')->getId(),
            'editUser' => Access_OBJECT_($_SESSION['login']['user'], 'username')->getId(),
        ]);
        $QUERY->closeCursor();
    }

    public function Delete():void {

    }

    public function Update():void {

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
    public function getDateMouvement()
    {
        return $this->dateMouvement;
    }

    /**
     * @param mixed $dateMouvement
     */
    public function setDateMouvement($dateMouvement): void
    {
        $this->dateMouvement = $dateMouvement;
    }

    /**
     * @return mixed
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * @param mixed $creator
     */
    public function setCreator($creator): void
    {
        $this->creator = $creator;
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
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @param mixed $quantite
     */
    public function setQuantite($quantite): void
    {
        $this->quantite = $quantite;
    }

    /**
     * @return mixed
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * @param mixed $article
     */
    public function setArticle($article): void
    {
        $this->article = $article;
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param mixed $users
     */
    public function setUsers($users): void
    {
        $this->users = $users;
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

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $order
     */
    public function setOrder($order): void
    {
        $this->order = $order;
    }


}