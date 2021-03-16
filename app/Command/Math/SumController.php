<?php


namespace App\Command\Math;


use Minicli\CommandController;

class SumController extends CommandController
{
    public function handle()
    {
        $number1 = $this->hasParam('num1') ? $this->getParam('num1') : 0;
        $number2 = $this->hasParam('num2') ? $this->getParam('num2') : 0;
        $this->getPrinter()->display(sprintf("The result sum of value %d + %d = %d!", $number1, $number2
            , ($number1 + $number2)));
    }
}