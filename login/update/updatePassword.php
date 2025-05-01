<?php
require "../../templates/header_sessions.php";
include "../../templates/footer.php";
require "../../backend/DBconnect.php";

$new_pass = $_POST['new-password'];
$verify_pass = $_POST['verify-new-password'];
$old_password = $_POST['old-password'];
$id = $_SESSION['userLoginID'];

$sql = "SELECT Password FROM login WHERE LoginID = '$id'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$database_password = $stmt->fetch(PDO::FETCH_ASSOC);

if (empty($new_pass) || empty($verify_pass) || empty($old_password)) {
    echo "Please enter all fields.";
} else {
    if ($new_pass != $verify_pass) {
        echo "New password did not match.";
    } else {
        if (!($old_password = $database_password)) {
            echo "Old password is wrong.";
        } else {
            $sql = "UPDATE login SET Password = '$new_pass' WHERE LoginID = '$id'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            echo "Password updated.";
        }
    }
}
