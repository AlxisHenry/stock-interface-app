<?php

class Alertes
{
    private $id;
    private $mail;
    private $mailModification;
    private $menu;
    private $menuModification;
    private $seuil;
    private $seuilModification;

    public function UpdateThreshold(int $threshold, int $id) {
        $REQUEST = 'UPDATE `alertes` SET seuil = :threshold, seuilModification = (SELECT NOW()) WHERE `id` = :id';
        $QUERY = Connection()->prepare($REQUEST);
        $QUERY->execute([
            'threshold' => $threshold,
            'id' => $id
        ]);
        $QUERY->closeCursor();
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
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getMailModification()
    {
        return $this->mailModification;
    }

    /**
     * @param mixed $mailModification
     */
    public function setMailModification($mailModification): void
    {
        $this->mailModification = $mailModification;
    }

    /**
     * @return mixed
     */
    public function getMenu()
    {
        return $this->menu;
    }

    /**
     * @param mixed $menu
     */
    public function setMenu($menu): void
    {
        $this->menu = $menu;
    }

    /**
     * @return mixed
     */
    public function getMenuModification()
    {
        return $this->menuModification;
    }

    /**
     * @param mixed $menuModification
     */
    public function setMenuModification($menuModification): void
    {
        $this->menuModification = $menuModification;
    }

    /**
     * @return mixed
     */
    public function getSeuil()
    {
        return $this->seuil;
    }

    /**
     * @param mixed $seuil
     */
    public function setSeuil($seuil): void
    {
        $this->seuil = $seuil;
    }

    /**
     * @return mixed
     */
    public function getSeuilModification()
    {
        return $this->seuilModification;
    }

    /**
     * @param mixed $seuilModification
     */
    public function setSeuilModification($seuilModification): void
    {
        $this->seuilModification = $seuilModification;
    }

}