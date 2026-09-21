<?php

session_start();

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}

$previous = [];

if (isset($_COOKIE["previous_purchases"])) {
    $previous = explode(",", $_COOKIE["previous_purchases"]);
}


// Додавання товару
if (isset($_POST["product"])) {
    $product = $_POST["product"];

    $_SESSION["cart"][] = $product;
    $previous[] = $product;

    setcookie(
        "previous_purchases",
        implode(",", $previous),
        time() + 7 * 24 * 60 * 60
    );

    header("Location: index.php");
    exit;
}


// Видалення товару
if (isset($_POST["delete"])) {
    $index = $_POST["delete"];

    unset($_SESSION["cart"][$index]);

    $_SESSION["cart"] = array_values($_SESSION["cart"]);

    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Корзина</title>
</head>
<body>

<h3>Товари</h3>

<form method="post">
    <button type="submit" name="product" value="Ноутбук">Ноутбук</button>
    <button type="submit" name="product" value="Мишка">Мишка</button>
    <button type="submit" name="product" value="Клавіатура">Клавіатура</button>
</form>

<h3>Корзина</h3>

<?php

if (empty($_SESSION["cart"])) {
    echo "Корзина порожня";
}

foreach ($_SESSION["cart"] as $index => $product) {
    echo $product;

    echo '
    <form method="post" style="display:inline;">
        <button type="submit" name="delete" value="' . $index . '">
            Видалити
        </button>
    </form>
    ';

    echo "<br>";
}

?>

<h3>Попередні покупки</h3>

<?php

if (empty($previous)) {
    echo "Попередніх покупок немає";
}

foreach ($previous as $product) {
    echo $product . "<br>";
}

?>

</body>
</html>
