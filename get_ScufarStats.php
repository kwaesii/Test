<?php
include_once "la3_connection.php";

$result = $conn->query("SELECT opposing_team, 
               SUM(attack) AS total_attack, 
               SUM(block) AS total_block, 
               SUM(ace) AS total_ace 
        FROM score 
        WHERE event_code = 'SCUFAR3 2024'
        GROUP BY opposing_team
    ");

$output = [];
foreach ($result as $row) {
    $output[] = $row['opposing_team'] . ',' . $row['total_attack'] . ',' . $row['total_block'] . ',' . $row['total_ace'];
}
echo implode('#', $output);
?>