<?php

class userProfile
{
    private $id;
    private $username;
    private $email;
    private $password;
    private $bio;
    private $picture;

    /*---------------------------Setters-----------------------------*/
    public function __setID($id) {
        $this->id = $id;
    }
    public function __setUsername($username) {
        $this->username = $username;
    }
    public function __setPassword($password) {
        $this->password = $password;
    }
    public function __setEmail($email) {
        $this->email = $email;
    }
    public function __setBio($bio) {
        $this->bio = $bio;
    }
    public function __setPicture($picture) {
        $this->picture = $picture;
    }

    /*---------------------------Getters-----------------------------*/

    public function __getID() {
        return $this->id;
    }
    public function __getUsername() {
        return $this->username;
    }
    public function __getPassword() {
        return $this->password;
    }
    public function __getEmail() {
        return $this->email;
    }

    public function __getBio() {
        return $this->bio;
    }
    public function __getPicture() {
        return $this->picture;
    }
}