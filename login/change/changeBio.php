<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Username</title>
    <link rel="stylesheet" href="css/changeDetails.css">
</head>
<body>
<nav>
    <div class="topnav">
        <a href="../../index.php">Home</a>
        <a href="../../reviews/reviews.php">Reviews</a>
        <a href="../../products/products.php">Products</a>
    </div>
    <div class="accountnav">
        <button class="dropdownButton">Settings</button>
        <div class="dropdownContent">
            <a href="changeEmail.php">Change Email</a>
            <a href="changePassword.php">Change Password</a>
            <a href="changeBio.php">Edit Bio</a>
            <a href="changePfp.php">Change Profile Picture</a>
            <a href="../logout.php">Logout</a>
        </div>
    </div>
</nav>
<div class="change-details-container">
    <h3>Change Account Details</h3>
    <!-- TODO: Write php file to handle bio change. -->
    <form class="change-details-form" method="post" action="../update/updateDetails.php">
        Change your bio:
        <br>
        <?php
        $bio_file = file('../placeholders/bio.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $bio = $bio_file[0];
        ?>
        <textarea rows="10" cols="50" name="bio"><?php echo htmlspecialchars($bio); ?></textarea>
        <br><br>
        Your password:
        <br>
        <input type="password" name="password" required>
        <br><br>
        <input type="submit" value="submit">
    </form>
</div>
</body>
</html>