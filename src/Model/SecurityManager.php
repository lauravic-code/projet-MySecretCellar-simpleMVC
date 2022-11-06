<?php

namespace App\Model;

use PDO;

class SecurityManager extends AbstractManager
{
    public const TABLE = 'user';

    public function login(array $user): array|false
    {
        $statement = $this->pdo->prepare("SELECT * FROM " . self::TABLE . " WHERE email=:email and password=:password");
        $statement->bindValue('email', $user['email'], PDO::PARAM_STR);
        $statement->bindValue('password', $user['password'], PDO::PARAM_STR);

        $statement->execute();
        return $statement->fetch();     
    }
}
