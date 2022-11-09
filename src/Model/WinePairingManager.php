<?php

namespace App\Model;

use PDO;

class WinePairingManager extends AbstractManager
{
    public const TABLE = 'wine_has_winePairing';

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

    public function insert($wineDatas, $id)
    {
        // inserting lines on wine_has_pairing where wine_id
        $winePairings = $wineDatas['winePairings'];
        // var_dump($winePairings[0], $wineDatas);

        // die;
        foreach ($winePairings as $winePairing) {
            $query = 'INSERT INTO wine_has_winePairing VALUES(:wine_id, :winePairing_id)';
            $statement = $this->pdo->prepare($query);
            $data = [
                ':wine_id' => $id,
                ':winePairing_id' => $winePairing
            ];
            $statement->execute($data);
        }
    }

    public function update($wineDatas)
    {

        // deleting lines on wine_has_pairing where wine_id
        $query = 'DELETE FROM wine_has_winePairing WHERE wine_id = :id ';
        $statement = $this->pdo->prepare($query);

        $data = [':id' => $wineDatas['wine_id']];
        $statement->execute($data);

        // inserting lines on wine_has_pairing where wine_id
        $winePairings = $wineDatas['winePairings'];

        foreach ($winePairings as $winePairing) {
            $query = 'INSERT INTO wine_has_winePairing VALUES(:wine_id, :winePairing_id)';
            $statement = $this->pdo->prepare($query);
            $data = [
                ':wine_id' => $wineDatas['wine_id'],
                ':winePairing_id' => $winePairing
            ];
            $statement->execute($data);
        }
    }
}
