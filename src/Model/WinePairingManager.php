<?php

namespace App\Model;

use PDO;

class WinePairingManager extends AbstractManager
{
    public const TABLE = 'winePairing';

    public function selectInnerJoin(int $id): array|false
    {
        // fetch grapeVariety label for the grapeVarieties of a specific wine
        $statement = $this->pdo->prepare(
            "SELECT label     
            FROM wine_has_winePairing 
            INNER JOIN winePairing
            ON wine_has_winePairing.winePairing_id=winePairing.id
            WHERE wine_id=:id"
        );
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }
}
