<?php

if (isset($_FILES["file"])) {

    $fileName = $_FILES["file"]["name"];
    $fileTmp = $_FILES["file"]["tmp_name"];
    $fileSize = $_FILES["file"]["size"];
    $fileType = $_FILES["file"]["type"];

    $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $nameWithoutExtension = pathinfo($fileName, PATHINFO_FILENAME);

    if (!is_uploaded_file($fileTmp)) {
        echo "Файл не завантажено.";
        exit;
    }

    if ($extension != "png" && $extension != "jpg" && $extension != "jpeg") {
        echo "Дозволені тільки файли png, jpg, jpeg.";
        exit;
    }

    if ($fileSize > 2 * 1024 * 1024) {
        echo "Файл занадто великий. Максимальний розмір 2 МБ.";
        exit;
    }

    $uploadPath = "uploads/" . $fileName;

    if (file_exists($uploadPath)) {
        $fileName = $nameWithoutExtension . "_" . time() . "." . $extension;
        $uploadPath = "uploads/" . $fileName;
    }

    if (move_uploaded_file($fileTmp, $uploadPath)) {

        echo "Файл успішно завантажено.<br><br>";

        echo "Ім'я файлу: " . $fileName . "<br>";
        echo "Тип файлу: " . $fileType . "<br>";
        echo "Розмір: " . round($fileSize / 1024, 2) . " КБ<br><br>";

        echo '<a href="' . $uploadPath . '" download>Завантажити файл</a>';

    } else {
        echo "Помилка завантаження файлу.";
    }
}
