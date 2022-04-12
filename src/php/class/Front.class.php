<?php

class Front
{

    private $id;
    private $nom;
    private $comment;
    private $state;
    private $modification;
    private $count;

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
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state): void
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getModification()
    {
        return $this->modification;
    }

    /**
     * @param mixed $modification
     */
    public function setModification($modification): void
    {
        $this->modification = $modification;
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param mixed $count
     */
    public function setCount($count): void
    {
        $this->count = $count;
    }


}