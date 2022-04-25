<?php

class Logs
{

    private $id;
    private $user;
    private $date;
    private $asset;
    private $browser;
    private $system;
    private $lastActivity;

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
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getAsset()
    {
        return $this->asset;
    }

    /**
     * @param mixed $asset
     */
    public function setAsset($asset): void
    {
        $this->asset = $asset;
    }

    /**
     * @return mixed
     */
    public function getBrowser()
    {
        return $this->browser;
    }

    /**
     * @param mixed $browser
     */
    public function setBrowser($browser): void
    {
        $this->browser = $browser;
    }

    /**
     * @return mixed
     */
    public function getSystem()
    {
        return $this->system;
    }

    /**
     * @param mixed $system
     */
    public function setSystem($system): void
    {
        $this->system = $system;
    }

    /**
     * @return mixed
     */
    public function getLastActivity()
    {
        return $this->lastActivity;
    }

    /**
     * @param mixed $lastActivity
     */
    public function setLastActivity($lastActivity): void
    {
        $this->lastActivity = $lastActivity;
    }

    public function Insert() {

        $REQUEST = "INSERT INTO `logs` (user, date, asset, browser, system) VALUES (:user, (SELECT NOW()), :asset, :browser, :system );";
        $QUERY = Connection()->prepare($REQUEST);
        $QUERY->execute([
            ':user' => Access_OBJECT_(GetSession('login', 'user'), 'username')->getId(),
            ':asset' => getAssetName(),
            ':browser' => GetSession('login', 'browser'),
            ':system' => GetSession('login', 'system'),
        ]);
        $QUERY->closeCursor();
    }

}
