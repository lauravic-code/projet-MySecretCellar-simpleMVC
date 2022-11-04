<?php

namespace App\Model;

use PDO;

class UserManager extends AbstractManager
{
    public const TABLE = 'user';

    public function insertUser(): bool
    {
        $_POST['firstname'] = trim($_POST['firstname']);
        $_POST['lastname'] = trim($_POST['lastname']);
        $_POST['email'] = trim($_POST['email']);
        $_POST['password'] = trim($_POST['password']);
      //$avatar = trim($_POST['avatar']);
        $_POST['dateOfBirth'] = trim($_POST['dateOfBirth']);


        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`firstname`) VALUES (:firstname)");
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`lastname`) VALUES (:lastname)");

        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`password`) VALUES (:password)");
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`dateOfBirth`) VALUES (:dateOfBirth)");
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`email`) VALUES (:email)");

        $statement->bindValue('firstname', $_POST['firstname'], PDO::PARAM_STR);
        $statement->bindValue('lastname', $_POST['lastname'], PDO::PARAM_STR);
        $statement->bindValue('email', $_POST['email'], PDO::PARAM_STR);
        $statement->bindValue('password', $_POST['password'], PDO::PARAM_STR);
        $statement->bindValue('dateOfBirth', $_POST['dateOfBirth'], PDO::PARAM_STR);
       // $statement->bindValue('avatar', $user['avatar'], PDO::PARAM_STR);

        return $statement->execute();
    }
}
