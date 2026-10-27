<?php

session_start();

require_once __DIR__ . "/db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $sql = "SELECT * FROM users WHERE username = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $user["password"] == $password) {

        $_SESSION["user"] = $user["username"];

        header("Location: Welcome.php");
        exit;

    } else {
        $message = "Невірний логін або пароль.";
    }
}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Авторизація</title>
</head>
<body>

<h2>Авторизація</h2>

<form method="post">

    <label>Ім'я користувача:</label>
    <input type="text" name="username" required>

    <br><br>

    <label>Пароль:</label>
    <input type="password" name="password" required>

    <br><br>

    <input type="submit" value="Увійти">

</form>

<p><?php echo $message; ?></p>

</body>
</html>