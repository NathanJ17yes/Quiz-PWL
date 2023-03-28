<body>

    <table class="table table-hover">
        <thread>
            <tr>
                <th>Id</th>
                <th>Type</th>
                <th>Price</th>
                <th>Active</th>
            </tr>
        </thread>
    <?php
    $ticketDao = new \Dao\ticketDao();
    $tickets = $ticketDao -> fetchTicketFromDb();
    foreach ($tickets as $ticket_price){
        echo '<tr>';
        echo '<td>'.$ticket_price->getId().'</td>';
        echo '<td>'.$ticket_price->getType().'</td>';
        echo '<td>'.$ticket_price->getPrice().'</td>';
        echo '<td>'.$ticket_price->getActive().'</td>';
    }
    ?>
