<?php

namespace App\Model;

use PDO;

class WineManager extends AbstractManager
{
    public const TABLE = 'wine';

    public function update($wineDatas): void
    {
        // wine table update


            $values1 = "`color_id` = :color_id, `domaine` = :domaine,`type_id`=:type_id,";
            $values2 = "`vintage`=:vintage,`appellation_id`=:appellation_id,";
            $values3 = "`region_id`=:region_id,`country_id`=:country_id,";
            $values4 = "`description`=:description,`purchaseDate`=:purchaseDate,";
            $values5 = "`price`=:price,`drinkBefore`=:drinkBefore,`value`=:value,";
            $values6 = "`rank`=:rank,`comment`=:comment,`stock`=:stock,`cellarLocation`=:cellarLocation";

            $values = $values1 . $values2 . $values3 . $values4 . $values5 . $values6;

            $statement = $this->pdo->prepare("UPDATE wine SET " . $values . " WHERE `id`=:id");

            $statement->bindValue('id', $wineDatas['wine_id'], \PDO::PARAM_INT);
            $statement->bindValue('color_id', $wineDatas['color_id'], \PDO::PARAM_INT);
            $statement->bindValue('domaine', $wineDatas['domaine'], \PDO::PARAM_STR);
            $statement->bindValue('type_id', $wineDatas['type_id'], \PDO::PARAM_INT);
            $statement->bindValue('vintage', $wineDatas['vintage'], \PDO::PARAM_INT);
            $statement->bindValue('appellation_id', $wineDatas['appellation_id'], \PDO::PARAM_INT);
            $statement->bindValue('region_id', $wineDatas['region_id'], \PDO::PARAM_INT);
            $statement->bindValue('country_id', $wineDatas['country_id'], \PDO::PARAM_INT);
            $statement->bindValue('description', $wineDatas['description'], \PDO::PARAM_STR);
            $statement->bindValue('purchaseDate', $wineDatas['purchaseDate'], \PDO::PARAM_STR);
            $statement->bindValue('price', $wineDatas['price'], \PDO::PARAM_STR);
            $statement->bindValue('drinkBefore', $wineDatas['drinkBefore'], \PDO::PARAM_INT);
            $statement->bindValue('value', $wineDatas['value'], \PDO::PARAM_STR);
            $statement->bindValue('rank', $wineDatas['rank'], \PDO::PARAM_INT);
            $statement->bindValue('comment', $wineDatas['comment'], \PDO::PARAM_STR);
            $statement->bindValue('stock', $wineDatas['stock'], \PDO::PARAM_INT);
            $statement->bindValue('cellarLocation', $wineDatas['cellarLocation'], \PDO::PARAM_STR);

            $statement->execute();
    }

    public function searchDomaine(string $search)
    {

        $query = "SELECT * FROM " . static::TABLE . " WHERE domaine LIKE '%" . $search . "%'";


        return $this->pdo->query($query)->fetchAll();
    }


    public function insertWine(array $wineDatas)
    {
        $que = "(`color_id`, `domaine`,`type_id`,`vintage`,`appellation_id`,`region_id`,`country_id`,";
        $que2 = "`description`,`purchaseDate`,`price`,`drinkBefore`,`value`,`rank`,`comment`,`stock`,`cellarLocation`)";
        $val = "(:color_id, :domaine, :type_id, :vintage, :appellation_id, :region_id,:country_id,";
        $val2 = ":description, :purchaseDate,:price, :drinkBefore, :value, :rank, :comment, :stock, :cellarLocation)";
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . $que . $que2 . " VALUES" . $val . $val2);

        $statement->bindValue('color_id', $wineDatas['color_id'], \PDO::PARAM_INT);
        $statement->bindValue('domaine', $wineDatas['domaine'], \PDO::PARAM_STR);
        $statement->bindValue('type_id', $wineDatas['type_id'], \PDO::PARAM_INT);
        $statement->bindValue('vintage', $wineDatas['vintage'], \PDO::PARAM_INT);
        $statement->bindValue('appellation_id', $wineDatas['appellation_id'], \PDO::PARAM_STR);
        $statement->bindValue('region_id', $wineDatas['region_id'], \PDO::PARAM_INT);
        $statement->bindValue('country_id', $wineDatas['country_id'], \PDO::PARAM_INT);
        $statement->bindValue('description', $wineDatas['description'], \PDO::PARAM_STR);
        $statement->bindValue('purchaseDate', $wineDatas['purchaseDate'], \PDO::PARAM_STR);
        $statement->bindValue('price', $wineDatas['price'], \PDO::PARAM_STR);
        $statement->bindValue('drinkBefore', $wineDatas['drinkBefore'], \PDO::PARAM_INT);
        $statement->bindValue('value', $wineDatas['value'], \PDO::PARAM_STR);
        $statement->bindValue('rank', $wineDatas['rank'], \PDO::PARAM_INT);
        $statement->bindValue('comment', $wineDatas['comment'], \PDO::PARAM_STR);
        $statement->bindValue('stock', $wineDatas['stock'], \PDO::PARAM_INT);
        $statement->bindValue('cellarLocation', $wineDatas['cellarLocation'], \PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
