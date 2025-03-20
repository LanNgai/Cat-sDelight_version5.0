<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    require "../backend/config.php";
    include "login-validation.php";
    require "../templates/footer.php";
    require "userProfile.class.php";

    $userProfile = new UserProfile();
    $userProfile->__loadProfile(clean($_GET["id"]));
    ?>
    <title>
        <?= $userProfile->__getUsername()."'s Profile" ?>
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
            <img src="placeholders/<?= $userProfile->__getPicture(); ?>" alt="Profile Picture" class="profile-picture"/>
            <div class="profile-details">
                <h2 class="profile-name">
                    <?= $userProfile->__getUsername(); ?>
                </h2>
                <h3 class="profile-email">
                    <?= $userProfile->__getEmail(); ?>
                </h3>
                <p class="profile-bio">
                    <?= $userProfile->__getBio(); ?>
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