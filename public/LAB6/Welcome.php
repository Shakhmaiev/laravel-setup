<?php

session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>
<body>

<h2>Вітаємо!</h2>

<p>Ви увійшли як: <?php echo $_SESSION["user"]; ?></p>

<a href="logout.php">Вийти</a>

</body>
</html>