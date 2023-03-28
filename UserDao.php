<?php
namespace Dao;

use entity\mq_user;
use PDO;

class UserDao
{
    public function login($username, $password): bool|mq_user
    {
        $link = PDOutil::createMySQLConnection();
        $query = 'SELECT id, name, username FROM mq_user WHERE username = ? AND password = MD5(?)';
        $stmt = $link ->prepare($query);
        $stmt->bindparam(1, $username);
        $stmt->bindparam(2, $password);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $user = $stmt->fetchObject(mq_user::class);
        $link = null;
        return $user;
    }

    public function name($username)
    {
        $link = PDOutil::createMySQLConnection();
        $query = 'SELECT name from mq_user WHERE username = ?';
        $stmt->bindParam(1, $username);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $user = $stmt->fetchAll();
        $link = null;
        return $user;
    }
}

?>