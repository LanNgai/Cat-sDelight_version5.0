<?php

class userProfile
{
    private $id;
    private $username;
    private $email;
    private $password;
    private $bio;
    private $picture;

    public function __loadProfile($id)
    {
        try {
            require "../backend/config.php";

            $sql = "SELECT * FROM user WHERE UserID=:id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->__constructProfile($result['Username'], $result['Email'], $result['Password'], $result['Bio'], $result['Picture']);
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function __constructProfile($username, $email, $password, $bio, $picture)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->bio = $bio;
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