<?php require "../templates/header.php" ?>
    <title>Login Page</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<nav>
    <?php require "../templates/topnav.php"?>
</nav>
    <?php
        if(!isset($_SESSION['Action'])){?>
            <div class="login-container">
        <h3>Login</h3>
        <form class="login-form" method="post" action="login-validation.php">
                Your username:
            <br>
            <input type="text" name="username" required>
            <br><br>
            Your Email:
            <br>
            <input type="email" name="email" required>
            <br><br>
            Your password:
            <br>
            <input type="password" name="password" required>
            <br><br>
            <input type="submit" name="submit" value="submit">
        </form>
        <div class="links-container">
            <p>No account? <a href="../registration/registration.php">Register Here!</a></p>
            <a href="../index.php">Go to Home Page</a>
        </div>
    </div>
        <?php } else{?>
        <div class="login-container">
            <h3>You are already logged in!</h3>
        </div>         <?php } ?>

</body>
</html>

