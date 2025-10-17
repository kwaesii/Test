<?php 
    include_once "la3_connection.php";

    $result = $conn->query("SELECT position_code, COUNT(position_code) AS pos_count FROM account GROUP BY position_code");

    $output = [];
    foreach($result as $row){
        $output[] = $row['position_code'].','.$row['pos_count'];
    }
    echo implode('#', $output);
?>