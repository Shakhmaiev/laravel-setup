<?php

if (isset($_POST["name"])) {
    setcookie("username", $_POST["name"], time() + 7 * 24 * 60 * 60);
    $_COOKIE["username"] = $_POST["name"];
}

if (isset($_POST["delete"])) {
    setcookie("username", "", time() - 3600);
    unset($_COOKIE["username"]);
}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Cookie</title>
</head>
<body>

<?php

if (isset($_COOKIE["username"])) {
    echo "Привіт, " . $_COOKIE["username"] . "!";
}

?>

<br><br>

<form method="post">
    <label>Ім'я:</label>
    <input type="text" name="name">
    <input type="submit" value="Зберегти">
</form>

<br>

<form method="post">
    <input type="submit" name="delete" value="Видалити cookie">
</form>

</body>
</html>
