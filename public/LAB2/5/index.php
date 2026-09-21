<?php

session_start();

$message = "";

if (isset($_SESSION["last_activity"])) {
    if (time() - $_SESSION["last_activity"] > 300) {
        session_destroy();

        session_start();
        $message = "Сесію завершено через неактивність більше 5 хвилин.";
    }
}

$_SESSION["last_activity"] = time();

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Session Activity</title>
</head>
<body>

<?php
if ($message != "") {
    echo "<p>" . $message . "</p>";
}
?>

<h3>Сесія активна</h3>

<p>Час останньої активності збережено.</p>

</body>
</html>
