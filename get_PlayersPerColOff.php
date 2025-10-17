<?php 
    include_once "la3_connection.php";

    $result = $conn->query("SELECT college_code, COUNT(college_code) AS col_off_count FROM account GROUP BY college_code");

    $output = [];
    foreach($result as $row){
        $output[] = $row['college_code'].','.$row['col_off_count'];
    }
    echo implode('#', $output);
?>