<?php

class login
{
    private $loginID;
    private $username;
    private $email;
    private $password;

    public function __loadProfile($loginID)
    {
        try {
            require "../backend/DBconnect.php";

            $sql = "SELECT login.Username, 
                            login.Email, 
                            login.Password,
                            profile.Bio,
                            profile.ProfileImage AS Picture
                            FROM login
                            JOIN user ON login.LoginID = user.UserLoginID
                            JOIN profile ON user.UserLoginID = profile.UserLoginID
                            WHERE login.LoginID = :id";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $loginID, PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->__construct($result['LoginID'], $result['Username'], $result['Email'], $result['Password']);
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    function __construct($loginID, $username, $email, $password)
    {
        $this->loginID = $loginID;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

//    public function __getLoginID() {
//        return $this->loginID;
//    }
//    public function __getUsername() {
//        return $this->username;
//    }
//    public function __getPassword() {
//        return $this->password;
//    }
//    public function __getEmail() {
//        return $this->email;
//    }
}