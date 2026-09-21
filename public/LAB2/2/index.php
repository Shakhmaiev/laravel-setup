<?php

session_start();

$error = "";

if (isset($_POST["login"]) && isset($_POST["password"])) {
    $login = $_POST["login"];
    $password = $_POST["password"];

    if ($login == "admin" && $password == "1234") {
        $_SESSION["user"] = $login;

        header("Location: index.php");
        exit;
    } else {
        $error = "Невірний логін або пароль";
    }
}

if (isset($_POST["logout"])) {
    session_destroy();

    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Session</title>
</head>
<body>

<?php if (isset($_SESSION["user"])) { ?>

    <p>Привіт, <?php echo $_SESSION["user"]; ?>!</p>

    <form method="post">
        <input type="submit" name="logout" value="Вихід">
    </form>

<?php } else { ?>

    <form method="post">
        <label>Логін:</label>
        <input type="text" name="login">

        <br><br>

        <label>Пароль:</label>
        <input type="password" name="password">

        <br><br>

        <input type="submit" value="Увійти">
    </form>

    <p><?php echo $error; ?></p>

<?php } ?>

</body>
</html>
