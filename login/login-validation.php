<?php
if (isset($_POST['submit'])) {

    require "../backend/config.php";
    include "../templates/footer.php";

    $user_username = clean($_POST['username']);
    $user_password = clean($_POST['password']);

    try {

        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

        $stmt = $conn->prepare("SELECT UserID, Password FROM user WHERE Username = :user_username");

        $stmt->bindParam(':user_username', $user_username);
        $stmt->execute();

        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($user_data);
        echo $user_data['Password'];
        echo $user_password;
        // Verify the password
        if (!empty($user_data) && password_verify($user_password, $user_data['Password'])) {
            header("Location: account.php");
            exit();
        } else if(!password_verify($user_password, $user_data['Password'])) {
            var_dump(password_verify($user_password, $user_data['Password']));
            echo "Invalid username or password.";
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    } finally {
        $conn=null;
    }
}