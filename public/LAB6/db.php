<?php

$host = "mysql";
$db = "users_db";
$user = "user";
$password = "password";

$pdo = new PDO(
    "mysql:host=$host;dbname=$db",
    $user,
    $password
);