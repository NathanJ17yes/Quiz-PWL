<?php
    session_start();
    if(!isset($_SESSION['is_user_logged'])){
        $_SESSION['is_user_logged'];
    }
    include_once 'Dao/UserDao.php';
    include_once 'Dao/PDOutil.php';
    include_once 'entity/mq_user.php';
    include_once 'Dao/ticketDao.php';
    include_once 'Dao/parkingDao.php';
    include_once 'entity/parking_detail.php';
    include_once 'entity/ticket_price.php';
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
    <?php
        if($_SESSION['is_user_logged']){

        ?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
          
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="?menu=home">home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?menu=Ticket_Price">Ticket Price</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?menu=Parking_Management">Parking Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?menu=logout">logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
        <?php
        $navigation = filter_input(INPUT_GET, 'menu');
        switch($navigation){
            case 'home':
                include_once 'pages/home.php';
                break;
            case 'Ticket_Price':
                include_once 'pages/Ticket_price.php';
                break;
            case 'Parking_Management':
                include_once 'pages/parking_detail.php';
                break;
            case 'logout':
                session_unset();
                session_destroy();
                header("location:index.php");
                break;
            default : 
                include_once 'pages/home.php';
            
        }?>
        <?php
        }else{
            include_once 'pages/login.php';
        }
        ?>
        