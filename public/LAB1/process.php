<?php

$name = $_POST["name"];
$surname = $_POST["surname"];

if (empty($name) || empty($surname)) {
    echo "Заповніть всі поля";
} elseif (!is_string($name) || !is_string($surname)) {
    echo "Некоректний тип даних";
} else {
    echo "Даровчик, " . $name . " " . $surname . "!";
}
