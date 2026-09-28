<?php

$files = scandir("uploads");

echo "<h3>Список файлів</h3>";

foreach ($files as $file) {

    if ($file != "." && $file != "..") {

        echo $file . " ";

        echo '<a href="uploads/' . $file . '" download>Завантажити</a>';

        echo "<br>";
    }
}
