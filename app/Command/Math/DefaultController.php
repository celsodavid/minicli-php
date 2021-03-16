<?php


namespace App\Command\Math;


use Minicli\CommandController;

class DefaultController extends CommandController
{
    public function handle()
    {
        $this->getPrinter()->display("Math is now!");
    }
}