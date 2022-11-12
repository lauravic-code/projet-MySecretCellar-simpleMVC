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
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
       //$avatar = trim($_POST['avatar']);
        $_POST['dateOfBirth'] = trim($_POST['dateOfBirth']);

        $query = "`firstname`, `lastname`, `password`, `dateOfBirth`, `email`";
        $value = ":firstname, :lastname, :password, :dateOfBirth, :email";
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . "($query) VALUES ($value)");
        $statement->bindValue('firstname', $_POST['firstname'], PDO::PARAM_STR);
        $statement->bindValue('lastname', $_POST['lastname'], PDO::PARAM_STR);
        $statement->bindValue('email', $_POST['email'], PDO::PARAM_STR);
        $statement->bindValue('password', $_POST['password'], PDO::PARAM_STR);
        $statement->bindValue('dateOfBirth', $_POST['dateOfBirth'], PDO::PARAM_STR);
        // $statement->bindValue('avatar', $user['avatar'], PDO::PARAM_STR);

        return $statement->execute();
    }

    public function updateUser(): bool
    {
        $_POST['firstname'] = trim($_POST['firstname']);
        $_POST['lastname'] = trim($_POST['lastname']);
        $_POST['email'] = trim($_POST['email']);
       // $_POST['password'] = trim($_POST['password']);
        // $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
       //$avatar = trim($_POST['avatar']);
        $_POST['dateOfBirth'] = trim($_POST['dateOfBirth']);

        $statement = $this->pdo->prepare(" UPDATE " . self::TABLE . " SET `firstname` = :firstname,
         `lastname` = :lastname, `dateOfBirth` = :dateOfBirth, `email` =:email WHERE `id`=:id");

        $statement->bindValue('firstname', $_POST['firstname'], PDO::PARAM_STR);
        $statement->bindValue('lastname', $_POST['lastname'], PDO::PARAM_STR);
        $statement->bindValue('email', $_POST['email'], PDO::PARAM_STR);
        // $statement->bindValue('password', $_POST['password'], PDO::PARAM_STR);
        $statement->bindValue('dateOfBirth', $_POST['dateOfBirth'], PDO::PARAM_STR);
        $statement->bindValue('id', $_POST['id'], PDO::PARAM_INT);
        // $statement->bindValue('avatar', $user['avatar'], PDO::PARAM_STR);
        session_unset();
        $_SESSION['user'] = $_POST;

        return $statement->execute();
    }
}
