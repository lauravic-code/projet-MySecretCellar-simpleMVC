<?php

namespace App\Model;

use PDO;

class HomeManager extends AbstractManager
{
    public const TABLE = 'wine';

    public function randomWine($date)
    {
        $statement = $this->pdo->prepare("SELECT * FROM wine WHERE drinkBefore=:drinkBefore
         ORDER BY RAND()
        LIMIT 1");

        $statement->bindValue('drinkBefore', $date, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }
}
