<?php
namespace Dao;

use entity\ticket_price;
use \Dao\PDOutil;
use PDO;

class ticketDao
{
    public function fetchTicketFromDb(){
        $link = PDOutil::createMySQLConnection();
        $query = 'SELECT id, type, price, active from ticket_price';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, ticket_price::class);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $link = null;
        return $result;
    }
}
?>
