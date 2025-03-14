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
    $userProfile->__setID(clean($_GET["id"]));


    $id = $userProfile->__getID();

    try {

        $sql = "SELECT * FROM user WHERE UserID=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }catch (PDOException $e){
        echo $e->getMessage();
    }
    ?>

    <?php
    //TODO: Placeholder bio text
    $bio_file = file('placeholders/bio.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $user = [
        'name' => ($result['Username']),
        'email' => ($result['Email']),
        'bio' => $bio_file[0],
        'profile_picture' => 'placeholder_pfp.jpg' //TODO: Placeholder image
    ];
    ?>
    <title>
        <?= $user['name']."'s Profile" ?>
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
            <img src="<?= $user['profile_picture']; ?>" alt="Profile Picture" class="profile-picture"/>
            <div class="profile-details">
                <h2 class="profile-name">
                    <?= $user['name']; ?>
                </h2>
                <h3 class="profile-email">
                    <?= $user['email']; ?>
                </h3>
                <p class="profile-bio">
                    <?= $user['bio']; ?>
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