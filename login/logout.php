<?php require "../templates/header.php"?>
<title> Logout </title>
<link rel="stylesheet" href="../index.css">
</head>
<body>
<?php
    $_SESSION['Active'] = !$_SESSION['Active'];
    echo "<h1>You have logged out of your account</h1>";
    echo $_SESSION['Active'];
?>
<h2>Go back to the homepage: <a href="../index.php">Click here!</a></h2>
</body>
</html>