<?php require "../templates/header.php"?>

<?php
    require "../backend/config.php";
    include "login-validation.php";
    require "../templates/footer.php";
    require "UserProfile.class.php";
    require "Login.class.php";
    require "User.class.php";

    $id = clean($_GET["id"]);
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
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }catch (PDOException $e){
        echo $e->getMessage();
    }

    $login = new Login($id, $result["Username"], $result["Email"], $result["Password"]);
    $userProfile = new UserProfile($result["Bio"], $result["Picture"]);
    $user = new User($id, $result["Username"], $result["Email"], $result["Password"], $userProfile);
    ?>
    <title>
        <?= $login->getUsername()."'s Profile" ?>
    </title>
    <link rel="stylesheet" href="css/account.css">
</head>
<body>
<nav>
    <div class="topnav">
        <a href="../index.php">Home</a>
        <a href="../reviews/reviews.php">Reviews</a>
        <a href="../products/products.php">Products</a>
    </div>
    <div class="accountnav">
        <button class="dropdownButton">Settings</button>
        <div class="dropdownContent">
            <a href="change/changeUsername.php">Change Username</a>
            <a href="change/changeEmail.php">Change Email</a>
            <a href="change/changePassword.php">Change Password</a>
            <a href="change/changeBio.php">Edit Bio</a>
            <a href="change/changePfp.php">Change Profile Picture</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
</nav>
    <div class="overall-profile-container">
        <div class="profile-container">
            <img src="../data/images/placeholders/<?= $userProfile->getPicture(); ?>" alt="Profile Picture" class="profile-picture"/>
            <div class="profile-details">
                <h2 class="profile-name">
                    <?= $login->getUsername(); ?>
                </h2>
                <h3 class="profile-email">
                    <?= $login->getEmail(); ?>
                </h3>
                <p class="profile-bio">
                    <?= $userProfile->getBio(); ?>
                </p>
            </div>
        </div>

        <div class="profile-comments-container">
            <?php if (!empty($comments)): ?>
                <?php foreach ($comments as $comment): ?>
                    <div class="comment">
                        <p><?php echo htmlspecialchars($comment['comment']); ?></p>
                        <p class="comment-date">
                            Posted on: <?php echo date("F j, Y, g:i a", strtotime($comment['created_at'])); ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p id="comment-error">No comments found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>