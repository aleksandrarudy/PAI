<?php

class Image
{
    private $id_img;
    private $category;
    private $picture;
    private $description;
    private $camera;
    private $lens;
    private $flash;
    private $aperture;
    private $light;
    private $exposure;
    private $focus;
    private $iso;

    public function __construct($camera, $lens, $flash, $aperture, $exposure, $focus, $iso, $light, $description, $picture, $category,$id_img=null)
    {
        $this->camera = $camera;
        $this->lens = $lens;
        $this->flash = $flash;
        $this->aperture = $aperture;
        $this->exposure = $exposure;
        $this->focus = $focus;
        $this->iso = $iso;
        $this->light = $light;
        $this->description = $description;
        $this->picture = $picture;
        $this->category = $category;
        $this->id_img = $id_img;

    }


    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }


    public function getIdImg()
    {
        return $this->id_img;
    }

    public function setIdImg($id_img): void
    {
        $this->id_img = $id_img;
    }

    public function getCamera()
    {
        return $this->camera;
    }


    public function setCamera($camera)
    {
        $this->camera = $camera;
    }


    public function getLens()
    {
        return $this->lens;
    }


    public function setLens( $lens)
    {
        $this->lens = $lens;
    }

    public function getFlash()
    {
        return $this->flash;
    }


    public function setFlash( $flash)
    {
        $this->flash = $flash;
    }

    public function getAperture()
    {
        return $this->aperture;
    }


    public function setAperture( $aperture)
    {
        $this->aperture = $aperture;
    }

    public function getExposure()
    {
        return $this->exposure;
    }


    public function setExposure( $exposure)
    {
        $this->exposure = $exposure;
    }


    public function getFocus()
    {
        return $this->focus;
    }

    public function setFocus($focus)
    {
        $this->focus = $focus;
    }

    public function getIso()
    {
        return $this->iso;
    }

    public function setIso($iso)
    {
        $this->iso = $iso;
    }

    public function getLight()
    {
        return $this->light;
    }

    public function setLight($light)
    {
        $this->light = $light;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture)
    {
        $this->picture = $picture;
    }


}
