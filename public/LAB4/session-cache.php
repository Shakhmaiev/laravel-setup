<?php

session_start();

$cacheTime = 600;

if (
    isset($_SESSION["cached_data"]) &&
    isset($_SESSION["cached_time"]) &&
    time() - $_SESSION["cached_time"] < $cacheTime
) {
    $data = $_SESSION["cached_data"];
    $source = "Дані взято з кешу сесії.";
} else {

    sleep(2);

    $data = [
        "USD" => rand(38, 43),
        "EUR" => rand(42, 47),
        "PLN" => rand(9, 11)
    ];

    $_SESSION["cached_data"] = $data;
    $_SESSION["cached_time"] = time();

    $source = "Дані створено заново.";
}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Session Cache</title>
</head>
<body>

<h2>Курси валют</h2>

<p><?php echo $source; ?></p>

<p>USD: <?php echo $data["USD"]; ?></p>
<p>EUR: <?php echo $data["EUR"]; ?></p>
<p>PLN: <?php echo $data["PLN"]; ?></p>

</body>
</html>
