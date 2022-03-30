<?php

namespace Front;

class Front
{

    private $id;
    private $barre;
    private $barreModification;
    private $configurations;
    private $configurationsModification;
    private $theme;
    private $themeModification;

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
    public function getBarre()
    {
        return $this->barre;
    }

    /**
     * @param mixed $barre
     */
    public function setBarre($barre): void
    {
        $this->barre = $barre;
    }

    /**
     * @return mixed
     */
    public function getBarreModification()
    {
        return $this->barreModification;
    }

    /**
     * @param mixed $barreModification
     */
    public function setBarreModification($barreModification): void
    {
        $this->barreModification = $barreModification;
    }

    /**
     * @return mixed
     */
    public function getConfigurations()
    {
        return $this->configurations;
    }

    /**
     * @param mixed $configurations
     */
    public function setConfigurations($configurations): void
    {
        $this->configurations = $configurations;
    }

    /**
     * @return mixed
     */
    public function getConfigurationsModification()
    {
        return $this->configurationsModification;
    }

    /**
     * @param mixed $configurationsModification
     */
    public function setConfigurationsModification($configurationsModification): void
    {
        $this->configurationsModification = $configurationsModification;
    }

    /**
     * @return mixed
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * @param mixed $theme
     */
    public function setTheme($theme): void
    {
        $this->theme = $theme;
    }

    /**
     * @return mixed
     */
    public function getThemeModification()
    {
        return $this->themeModification;
    }

    /**
     * @param mixed $themeModification
     */
    public function setThemeModification($themeModification): void
    {
        $this->themeModification = $themeModification;
    }



}