<?php
namespace Dao;

use PDO;

class PDOutil
{
    public static function createMySQLConnection()
    {
        $link = new PDO('mysql:host=localhost;dbname=pwl20222q1', 'root');
        $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $link;
    }
}
