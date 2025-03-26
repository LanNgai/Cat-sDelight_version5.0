<?php

class userProfile
{
    private $login;

    public function __construct(login $login, $bio, $picture)
    {
        $this->login = $login;
        $this->bio = $bio;
        $this->picture = $picture;
    }
    /*---------------------------Getters-----------------------------*/

    public function __getBio() {
        return $this->bio;
    }
    public function __getPicture() {
        return $this->picture;
    }

    public function __getLogin()
    {
        return $this->login;
    }
}