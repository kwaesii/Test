<?php
include_once "la3_connection.php";

$username = $_GET['username'];

$query = "SELECT a.profile_picture, a.first_name, a.last_name, a.email, 
                     c.college_desc as college_office, a.jersey_num, p.position_desc as position, 
                     a.position_code, a.college_code
              FROM account AS a
              JOIN position AS p ON a.position_code = p.position_code
              JOIN college_office AS c ON a.college_code = c.college_code
              WHERE a.username = '$username'";

$result = $conn->query($query);
$row = $result->fetch_assoc();

if ($row) {
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $email = $row['email'];
    $position = $row['position'];
    $college_office = $row['college_office'];
    $jersey_number = $row['jersey_num'];
    $profile_picture = $row['profile_picture'];
    $position_code = $row['position_code'];
    $college_code = $row['college_code'];
} else {
    echo "User not found.";
    exit;
}

$scoreQuery = "SELECT opposing_team, 
                      SUM(attack) AS attack, 
                      SUM(block) AS block, 
                      SUM(ace) AS ace
               FROM score 
               WHERE username = '$username' 
               GROUP BY opposing_team";

$scoreResult = $conn->query($scoreQuery);

$teams = [];
$attacks = [];
$blocks = [];
$aces = [];

$total_attacks = 0;
$total_blocks = 0;
$total_aces = 0;

while ($scoreRow = $scoreResult->fetch_assoc()) {
    $teams[] = $scoreRow['opposing_team'];
    $attacks[] = (int) $scoreRow['attack'];
    $blocks[] = (int) $scoreRow['block'];
    $aces[] = (int) $scoreRow['ace'];

    $total_attacks += $scoreRow['attack'];
    $total_blocks += $scoreRow['block'];
    $total_aces += $scoreRow['ace'];
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile View</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="navbar.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="navbar.js"></script>
</head>

<body>
    <div class="profile">
        <div class="profile-card">
            <div class="top-section">
                <button id="close">x</button>
                <img src="<?php echo $profile_picture; ?>" alt="Profile Picture">
            </div>
            <div class="bot-section">
                <h2><?php echo $first_name . ' ' . $last_name; ?></h2>
                <p class="college"><i><?php echo $college_office . " (" . $college_code . ")"; ?></i></p>

                <p class="jersey"><strong>Jersey No:</strong></p>
                <div id="jersey"><?php echo $jersey_number; ?></div>

                <p class="position"><strong>Playing Position:</strong></p>
                <div id="pposition"><?php echo $position . " (" . $position_code . ")"; ?></div>

                <div class="view-profile-chart-container">
                    <canvas id="performanceChart" data-teams="<?php echo implode(',', $teams); ?>"
                        data-attacks="<?php echo implode(',', $attacks); ?>"
                        data-blocks="<?php echo implode(',', $blocks); ?>"
                        data-aces="<?php echo implode(',', $aces); ?>">
                    </canvas>
                </div>

                <div class="stat-cards">
                    <div class="card attacks">Attacks: <?php echo $total_attacks; ?></div>
                    <div class="card blocks">Blocks: <?php echo $total_blocks; ?></div>
                    <div class="card aces">Aces: <?php echo $total_aces; ?></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>