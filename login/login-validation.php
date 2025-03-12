<?php
if (isset($_POST['submit'])) {

    require "../backend/config.php";

    $user_username = $_POST['username'];
    $user_password = $_POST['password'];

    try {

        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

        $stmt = $conn->prepare("SELECT UserID, Password FROM user WHERE Username = :user_username");

        $stmt->bindParam(':user_username', $user_username);
        $stmt->execute();

        $user_data = $stmt->fetch();
        var_dump($user_data);

        // Verify the password
        if ($user_data && password_verify($user_password, $user_data['Password'])) {
            header("Location: account.php");
            exit();
        } else {
            echo "Invalid username or password.";
        }
    } catch (PDOException $e) {
        // Handle database errors
        echo "Database error: " . $e->getMessage();
    } finally {
        // Close the connection
        $conn=null;
    }
}