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
    <form class="change-details-form" method="post" action="../update/updateDetails.php">
        <!-- TODO: add toggle password visibility -->
        New Password:
        <br>
        <input type="password" name="new-password" required>
        <br><br>
        Verify New Password:
        <br>
        <input type="password" name="verify-new-password" required>
        <br><br>
        Old Password:
        <br>
        <input type="password" name="old-password" required>
        <br><br>
        <input type="submit" value="submit">
    </form>
</div>
</body>
</html>