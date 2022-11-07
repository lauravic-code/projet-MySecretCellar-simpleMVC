<?php

namespace App\Model;

use PDO;

class FiltresManager extends AbstractManager
{
    public const TABLE = 'wine';

    public function filterWines($filters): array
    {
        $query = 'SELECT * FROM ' . static::TABLE;
        $queryParams = '';
        //*************************************** */


        foreach ($filters as $filter => $value) {
            if (!empty($value)) {
                if (empty($queryParams)) {
                    $queryParams .= $filter . '_id = ' . $value;
                } else {
                    $queryParams .= ' AND ' . $filter . '_id = ' . $value;
                }
                var_dump($queryParams);
            }
        }

        if (!empty($queryParams)) {
            $query .= " WHERE $queryParams;";
        } else {
            $query .= ';';
        }

              //********************************************* */
        // if (!empty($filters['country'])) {
        //     $queryParams .= ' country_id = ' .  $filters['country'];
        // }
        // if (!empty($filters['region'])) {
        //     $queryParams .= (empty($queryParams) ? '' : ' AND ') . ' region_id = ' .  $filters['region'];
        // }
        // if (!empty($filters['appellation'])) {
        //     $queryParams .= (empty($queryParams) ? '' : ' AND ') . ' appellation_id = ' .  $filters['appellation'];
        // }
        // if (!empty($filters['color'])) {
        //     $queryParams .= (empty($queryParams) ? '' : ' AND ') . ' color_id = ' .  $filters['color'];
        // }
        // if (!empty($filters['type'])) {
        //     $queryParams .= (empty($queryParams) ? '' : ' AND ') . ' type_id = ' .  $filters['type'];
        // }
        // if (!empty($queryParams)) {
        //     $query .= " WHERE $queryParams;";
        // } else {
        //     $query .= ';';
        // }


        return $this->pdo->query($query)->fetchAll();
    }
}
