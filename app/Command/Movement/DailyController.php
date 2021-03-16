<?php


namespace App\Command\Movement;

use App\Command\Movement\Model\DailyModel;
use Minicli\CommandController;

class DailyController extends CommandController
{
    public function handle()
    {
        $customer = $this->hasParam('customer') ? $this->getParam('customer') : null;
        $database = $this->hasParam('database') ? $this->getParam('database') : null;
        $answer   = $this->hasParam('answer')   ? $this->getParam('answer')   : null;

        echo sprintf('Customer: %d', $customer) . PHP_EOL;
        echo sprintf('Data Cadastro: %s', $database) . PHP_EOL;
        echo sprintf('Data Resposta: %s', $answer) . PHP_EOL;
        //$this->dd($this->getParams());

        try {
            $dailyModel = new DailyModel();
            $customers = $dailyModel->getMovementsDaily($customer, $database, $answer);
            $this->dd($customers);
        } catch (\PDOException $pdoe) {
            $this->dd($pdoe->getMessage());
        }
    }
}
