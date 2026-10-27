<?php

require_once __DIR__ . "/db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    $sql = "INSERT INTO users (username, email, password)
            VALUES (?, ?, ?)";

    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$username, $email, $password]);

        $message = "Користувача успішно зареєстровано.";
    } catch (PDOException $e) {
        $message = "Помилка реєстрації.";
    }
}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Реєстрація</title>
</head>
<body>

<h2>Реєстрація</h2>

<form method="post">

    <label>Ім'я користувача:</label>
    <input type="text" name="username" required>

    <br><br>

    <label>Email:</label>
    <input type="email" name="email" required>

    <br><br>

    <label>Пароль:</label>
    <input type="password" name="password" required>

    <br><br>

    <input type="submit" value="Зареєструватися">

</form>

<p><?php echo $message; ?></p>

</body>
</html>