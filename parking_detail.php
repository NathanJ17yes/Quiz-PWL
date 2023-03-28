<body>
<table class="table table-hover">
        <thread>
            <tr>
                <th>Check in - out</th>
                <th>Vehicle Id</th>
                <th>Vehicle Type</th>
                <th>Price</th>
            </tr>
        </thread>
    <?php
    $parkingDao = new \Dao\parkingDao();
    $parkings = $parkingDao -> fetchParkingFromDb();
    foreach ($parkings as $parkingDao){
        echo '<tr>';
        echo '<td>'.$parkingDao->getCheck_in_time().'</td>';
        echo '<td>'.$parkingDao->getVehicle_id().'</td>';
        echo '<td>'.$parkingDao->getVehicle_type().'</td>';
        echo '<td>'.$parkingDao->getParking_price().'</td>';
    }
    ?>
</body>