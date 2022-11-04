<?php

namespace App\Model;

use PDO;

class WineManager extends AbstractManager
{
    public const TABLE = 'wine';

    public function searchDomaine()
    {

        $query = "SELECT * FROM " . static::TABLE . " WHERE domaine LIKE '%:searchValue%' ";


        return $this->pdo->query($query)->fetchAll();
    }
}
