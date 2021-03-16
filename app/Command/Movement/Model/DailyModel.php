<?php


namespace App\Command\Movement\Model;

use Minicli\Model;

class DailyModel extends Model
{
    public function getMovementsDaily($customer, $database, $answerDate)
    {
        $sql = 'SELECT * FROM PORTAL_TRAFFICS WHERE CUSTOMER_ID = :customer';
        $query = $this->db->prepare($sql);
        $query->execute([':customer' => $customer]);

        if ($query->rowCount() == 0) throw new \PDOException('Not found customers' . PHP_EOL);

        return $query->fetchAll();
    }
}
