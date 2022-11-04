<?php

namespace App\Model;

use PDO;

class WineManager extends AbstractManager
{
    public const TABLE = 'wine';

    public function searchDomaine(string $orderBy = '', string $direction = 'ASC')
    {

        $query = "SELECT * FROM " . static::TABLE . " WHERE domaine LIKE '%:value%' ";
        if ($orderBy) {
            $query .= ' ORDER BY ' . $orderBy . ' ' . $direction;
        }

        return $this->pdo->query($query)->fetchAll();
    }
}
