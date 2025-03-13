<?php
global $conn;
if (isset($_POST['submit'])) {

    include "../templates/footer.php";
    require "../backend/dbConnect.php";

    $user_username = clean($_POST['username']);
    $user_password = clean($_POST['password']);

    try {

        $stmt = $conn->prepare("SELECT UserID, Password FROM user WHERE Username = :user_username");

        $stmt->bindParam(':user_username', $user_username);
        $stmt->execute();

        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
        echo $user_data['Password'];
        echo $user_password;

        // TODO: Remember to put hashed values for the passwords stored in the DB!!!
        if (!empty($user_data) && $user_password == $user_data['Password']) {
            header("Location: account.php?id=" . $user_data['UserID']);
            exit();
        } else if($user_password != $user_data['Password']) {
            echo "Invalid password.";
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    } finally {
        $conn=null;
    }
}