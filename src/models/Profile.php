<?php

class Profile
{

    private $firstname;
    private $surname;
    private $biogram;
    private $profile_picture;

    public function __construct($firstname, $surname, $biogram, $profile_picture)
    {
        $this->firstname = $firstname;
        $this->surname = $surname;
        $this->biogram = $biogram;
        $this->profile_picture = $profile_picture;
    }

    public function getProfilePicture()
    {
        return $this->profile_picture;
    }


    public function setProfilePicture($profile_picture)
    {
        $this->profile_picture = $profile_picture;
    }


    public function getFirstname()
    {
        return $this->firstname;
    }


    public function setFirstname($firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getSurname()
    {
        return $this->surname;
    }


    public function setSurname($surname): void
    {
        $this->surname = $surname;
    }

    public function getBiogram()
    {
        return $this->biogram;
    }


    public function setBiogram($biogram): void
    {
        $this->biogram = $biogram;
    }







}