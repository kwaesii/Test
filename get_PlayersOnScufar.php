<?php
include_once "la3_connection.php";

$result = $conn->query("SELECT opposing_team, COUNT(username) AS team_count 
    FROM score 
    WHERE event_code = 'SCUFAR3 2024' 
    GROUP BY opposing_team");

$output = [];
foreach ($result as $row) {
    $output[] = $row['opposing_team'] . ',' . $row['team_count'];
}

echo implode('#', $output);
?>