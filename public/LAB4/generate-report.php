<?php

$cacheFile = "cache/report.html";
$cacheTime = 600;

if (file_exists($cacheFile)) {
    if (time() - filemtime($cacheFile) < $cacheTime) {
        echo "<p>Дані взято з кешу.</p>";
        echo file_get_contents($cacheFile);
        exit;
    }
}

sleep(3);

$html = "<h2>Звіт</h2>";
$html .= "<table border='1'>";
$html .= "<tr><th>№</th><th>Ім'я</th><th>Сума</th><th>Дата</th></tr>";

for ($i = 1; $i <= 1000; $i++) {
    $name = "Користувач " . $i;
    $sum = rand(100, 10000);
    $date = date("d.m.Y");

    $html .= "<tr>";
    $html .= "<td>" . $i . "</td>";
    $html .= "<td>" . $name . "</td>";
    $html .= "<td>" . $sum . "</td>";
    $html .= "<td>" . $date . "</td>";
    $html .= "</tr>";
}

$html .= "</table>";

file_put_contents($cacheFile, $html);

echo "<p>Звіт створено заново.</p>";
echo $html;
