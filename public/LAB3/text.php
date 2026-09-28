<?php

if (isset($_POST["text"])) {
    $text = $_POST["text"];

    file_put_contents("log.txt", $text . PHP_EOL, FILE_APPEND);
}

echo "<h3>Дані з файлу:</h3>";

if (file_exists("log.txt")) {
    $data = file_get_contents("log.txt");

    echo nl2br($data);
} else {
    echo "Файл ще не створений.";
}
