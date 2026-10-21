<?php

require_once "BankAccount.php";
require_once "SavingsAccount.php";

echo "<h3>Звичайний рахунок</h3>";

$account = new BankAccount(1000, "USD");

echo "Початковий баланс: " . $account->getBalance() . "<br>";

$account->deposit(500);

echo "Після поповнення: " . $account->getBalance() . "<br>";

$account->withdraw(300);

echo "Після зняття: " . $account->getBalance() . "<br>";


echo "<h3>Накопичувальний рахунок</h3>";

$savings = new SavingsAccount(2000, "USD");

echo "Початковий баланс: " . $savings->getBalance() . "<br>";

$savings->applyInterest();

echo "Після нарахування відсотків: " . $savings->getBalance() . "<br>";


echo "<h3>Перевірка помилки</h3>";

try {
    $account->withdraw(5000);
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage();
}

echo "<h3>Перевірка некоректної суми</h3>";

try {
    $account->deposit(-100);
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage();
}
