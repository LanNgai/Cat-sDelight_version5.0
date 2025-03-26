<?php

class user extends login
{
    private $profile;
 public function __construct($loginID, $username, $password, $email, $profile)
 {
     parent::__construct($loginID, $username, $email, $password);
     $this->profile = $profile;
 }


 public function setProfile($bio, $picture)
 {
    $this->profile = new userProfile($bio, $picture);
 }

 public function getProfile()
 {
     return $this->profile;
 }

}