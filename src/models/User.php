<?php

class User
{

    private $email;
    private $password;
    private $username;
    private $id;



    public function __construct(
        $id,
        $email,
        $password,
        $username

    )

    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId(string $id)
    {
        $this->id = $id;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail(string $email)
    {
        $this->email = $email;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword(string $password)
    {
        $this->password = $password;
    }


    public function getUsername()
    {
        return $this->username;
    }


    public function setUsername(string $username)
    {
        $this->username = $username;
    }





}