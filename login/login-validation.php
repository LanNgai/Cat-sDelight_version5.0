<?php
if (isset($_POST['submit'])) {

    include "../templates/footer.php";
    require "../backend/DBconnect.php";


    $user_username = clean($_POST['username']);
    $user_password = clean($_POST['password']);

    try {

        $stmt = $conn->prepare("SELECT LoginID, Username, Password FROM login WHERE Username = ?");

        $stmt->execute([$user_username]);

        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

        // TODO: Remember to put hashed values for the passwords stored in the DB!!!
        if (!empty($user_data) && $user_password == $user_data['Password']) {
            header("Location: displayProfile.php?id=" . $user_data['LoginID']);
            exit();
        } else {
            var_dump($user_data['Password']);
            echo "Invalid password.";
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    } finally {
        $conn=null;
    }
}