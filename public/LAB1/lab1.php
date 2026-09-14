<?php

// 1

// Виводимо текст на екран
echo "Hello, World!";

//  <?php — це початок PHP-коду.
//echo — команда для виведення інформації на сторінку
// 2
$name = "Mykyta";
$age = 19;
$height = 181.5;
$student = true;

echo "<br><br>";

echo "Ім'я: " . $name . "<br>";
echo "Вік: " . $age . "<br>";
echo "Зріст: " . $height . "<br>";
echo "Студент: " . $student . "<br>";

echo "<br>";

var_dump($name);
echo "<br>";

var_dump($age);
echo "<br>";

var_dump($height);
echo "<br>";

var_dump($student);

// 3

$firstName = "Mykyta";
$lastName = "Shakhmaiev";

$fullName = $firstName . " " . $lastName;

echo "<br><br>";
echo $fullName;

// 4

$number = 22;

if ($number % 2 == 0) {
    echo "<br><br>Число парне";
} else {
    echo "<br><br>Число непарне";
}

// 5

echo "<br><br>";

for ($i = 1; $i <= 10; $i++) {
    echo $i . " ";
}

echo "<br>";

$i = 10;

while ($i >= 1) {
    echo $i . " ";
    $i--;
}

// 6

$student = [
    "name" => "Mykyta",
    "surname" => "Shakhmaiev",
    "age" => 19,
    "specialty" => "Computer Science"
];

echo "<br><br>";

echo "Ім'я: " . $student["name"] . "<br>";
echo "Прізвище: " . $student["surname"] . "<br>";
echo "Вік: " . $student["age"] . "<br>";
echo "Спеціальність: " . $student["specialty"] . "<br>";

$student["averageGrade"] = 4.5;

echo "<br>";
print_r($student);
