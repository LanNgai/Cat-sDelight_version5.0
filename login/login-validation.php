<?php
if (isset($_POST['submit'])) {

    include "../templates/footer.php";
    require "../backend/DBconnect.php";


    $user_username = clean($_POST['username']);
    $user_password = clean($_POST['password']);

    try {
        session_start();
        $stmt = $conn->prepare("SELECT LoginID, Username, Password FROM login WHERE Username = ?");
        $stmt->execute([$user_username]);
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt_for_user = $conn->prepare("SELECT UserLoginID FROM user WHERE ".$user_data['LoginID']." = UserLoginID");
        $stmt_for_admin = $conn->prepare("SELECT AdminLoginID FROM administrator WHERE ".$user_data['LoginID']." = AdminLoginID");
        $stmt_for_user->execute();
        $stmt_for_admin->execute();
        $user_ID = $stmt_for_user->fetch(PDO::FETCH_ASSOC);
        $admin_ID = $stmt_for_admin->fetch(PDO::FETCH_ASSOC);

        // TODO: Remember to put hashed values for the passwords stored in the DB!!!
        if (!empty($user_data) && $user_password == $user_data['Password']) {
            if($user_data['LoginID'] == $user_ID['UserLoginID']) {
                $_SESSION['login'] == true;
                header("Location: displayProfile.php?id=" . $user_data['LoginID']);
                exit();
            } else if ($user_data['LoginID'] == $admin_ID['AdminLoginID']) {
                $_SESSION['login'] == true;
                header("Location: adminPage.php?id=" . $user_data['LoginID']);
                exit();
            }
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