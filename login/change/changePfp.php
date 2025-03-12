<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Profile Picture</title>
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
    <h3>Change Profile Picture</h3>
    <form class="change-details-form" method="post" action="changePfp.php" enctype="multipart/form-data">
        <label for="profile_picture">Upload a new profile picture:</label><br>
        <input type="file" id="profile_picture" name="profile_picture" accept="image/jpeg, image/png, image/gif" required>
        <br><br>
        <input type="submit" value="Upload">
    </form>
</div>
</body>
</html>

