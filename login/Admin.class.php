<?php

class Admin extends Login
{
    public $adminLoginID;
    private $reviews;
    public function __construct($loginID, $username, $email, $password, $reviews){
        parent::__construct($loginID, $username, $email, $password);
        $this->reviews = $reviews;
        $this->adminLoginID = $loginID;
    }

    public function getReviews()
    {
        return $this->reviews;
    }

}