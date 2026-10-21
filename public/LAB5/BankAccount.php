<?php

require_once "AccInterface.php";

class BankAccount implements AccInterface
{
    const MIN_BALANCE = 0;

    protected $balance;
    protected $currency;

    public function __construct($balance, $currency)
    {
        $this->balance = $balance;
        $this->currency = $currency;
    }

    public function deposit($amount)
    {
        if ($amount < 0) {
            throw new Exception("Некоректна сума поповнення");
        }

        $this->balance += $amount;
    }

    public function withdraw($amount)
    {
        if ($amount < 0) {
            throw new Exception("Некоректна сума зняття");
        }

        if ($amount > $this->balance) {
            throw new Exception("Недостатньо коштів");
        }

        $this->balance -= $amount;
    }

    public function getBalance()
    {
        return $this->balance . " " . $this->currency;
    }
}
