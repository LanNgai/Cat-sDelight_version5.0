<?php
global $conn;
if (isset($_POST['submit'])) {

    require "../backend/config.php";
    include "../templates/footer.php";

    $user_username = clean($_POST['username']);
    $user_password = clean($_POST['password']);

    try {

        require "../backend/dbConnect.php";
        $stmt = $conn->prepare("SELECT UserID, Password FROM user WHERE Username = :user_username");

        $stmt->bindParam(':user_username', $user_username);
        $stmt->execute();

        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($user_data);
        echo $user_data['Password'];
        echo $user_password;
        // Verify the password
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