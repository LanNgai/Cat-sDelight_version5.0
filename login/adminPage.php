<?php
require "../templates/header_sessions.php";

echo "You are in admin mode!";
?>

<?php
    require "../backend/config.php";
    require "login-validation.php";
    require "../templates/footer.php";
    require "UserProfile.class.php";
    require "Login.class.php";
    require "Admin.class.php";

$id = clean($_GET["id"]);
try {
    require "../backend/DBconnect.php";

    $sql = "SELECT login.Username, 
                            login.Email, 
                            login.Password
                            FROM login
                            JOIN administrator ON login.LoginID = administrator.AdminLoginID
                            WHERE login.LoginID = :id";

//    $sql = "SELECT reviews.ReviewID,
//            reviews.ReviewText,
//            reviews.AdminLoginID,
//            reviews.ProductID,
//            reviews.QualityRating,
//            reviews.DateAndTime
//            FROM reviews
//            JOIN administrator ON reviews.AdminLoginID = administrator.AdminLoginID
//            JOIN products ON reviews.ProductID = products.ProductID
//            WHERE administrator.AdminLoginID = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    var_dump($result);
}catch (PDOException $e){
    echo $e->getMessage();
}

$admin = new Admin($id, $result["Username"], $result["Email"], $result["Password"]);
?>
<title>
    <?= $admin->getUsername()."'s Profile" ?>
</title>
<link rel="stylesheet" href="css/account.css">
</head>
<body>
<nav>
    <?php require_once ('../templates/topnav.php') ?>
    <div class="accountnav">
        <button class="dropdownButton">Settings</button>
        <div class="dropdownContent">
            <a href="change/changeUsername.php">Change Username</a>
            <a href="change/changeEmail.php">Change Email</a>
            <a href="change/changePassword.php">Change Password</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
</nav>


