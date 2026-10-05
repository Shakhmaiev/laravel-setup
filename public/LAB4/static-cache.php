<?php

class Cache
{
    public static $data = null;

    public static function getData()
    {
        if (self::$data != null) {
            return self::$data;
        }

        sleep(2);

        self::$data = [
            "Ноутбук",
            "Мишка",
            "Клавіатура"
        ];

        return self::$data;
    }
}

$start1 = microtime(true);
$data1 = Cache::getData();
$time1 = microtime(true) - $start1;

$start2 = microtime(true);
$data2 = Cache::getData();
$time2 = microtime(true) - $start2;

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Static Cache</title>
</head>
<body>

<h2>Статичний кеш</h2>

<p>Перший виклик: <?php echo round($time1, 4); ?> сек.</p>
<p>Другий виклик: <?php echo round($time2, 4); ?> сек.</p>

<h3>Дані:</h3>

<?php

foreach ($data2 as $product) {
    echo $product . "<br>";
}

?>

</body>
</html>
