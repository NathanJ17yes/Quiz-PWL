<?php
namespace Dao;

use entity\parking_detail;
use \Dao\PDOutil;
use PDO;

class parkingDao
{
    public function fetchParkingFromDb(){
        $link = PDOutil::createMySQLConnection();
        $query = 'SELECT time_id, vehicle_id, vehicle_type, check_in_time, check_out_time, parking_price from parking_detail';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, parking_detail::class);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $link = null;
        return $result;
    }
}