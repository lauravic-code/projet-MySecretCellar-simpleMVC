<?php

namespace App\Model;

use PDO;

class SecurityManager extends AbstractManager
{
    public const TABLE = 'user';

    public function login(array $user): array|false
    {
        $statement = $this->pdo->prepare("SELECT * FROM " . self::TABLE . " WHERE email=:email ");
        $statement->bindValue('email', $user['email'], PDO::PARAM_STR);

        $statement->execute();
        $dbuser = $statement->fetch();

        if (!$dbuser) {
            return false;
        }
        $isVerify = password_verify($user['password'], $dbuser['password']);

        return $isVerify ? $dbuser : false;
    }
}
