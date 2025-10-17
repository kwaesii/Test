<?php
include_once "la3_connection.php";

$playerCount = $conn->query("SELECT COUNT(*) FROM account")->fetch_row()[0];
$collegeCount = $conn->query("SELECT COUNT(*) FROM college_office")->fetch_row()[0];
$eventCount = $conn->query("SELECT COUNT(*) FROM events")->fetch_row()[0];
$gamesCount = $conn->query("SELECT COUNT(DISTINCT event_code, opposing_team) FROM score")->fetch_row()[0];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Activity 4</title>
    <div class="logo"></div>
    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="dashboard.css">
    <script src="jquery-3.7.1.min.js"></script>
    <script src="navbar.js"></script>
    <script src="dashboard.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
    <nav class="navbar">
        <div class="logo"></div>
        <div class="navbar-links">
            <div id="dashboard"><i class="fas fa-area-chart"></i><span>Dashboard</span></div>
            <div id="account"><i class="fas fa-address-book"></i><span>Accounts</span></div>
            <div id="college"><i class="fas fa-graduation-cap"></i><span>Colleges</span></div>
            <div id="position"><i class="fas fa-volleyball-ball"></i><span>Positions</span></div>
            <div id="event"><i class="fas fa-calendar"></i><span>Events</span></div>
            <div id="logout"><i class="fas fa-sign-out"></i><span>Log Out</span></div>
        </div>
    </nav>

    <div class="content">
        <h1 class="dashboard-header">Dashboard</h1>

        <div class="cards-container">
            <div class="data-card" id="player-card">
                <div class="card-label">Registered </br>Players</div>
                <div class="card-value"><?php echo $playerCount; ?></div>
            </div>
            <div class="data-card" id="college-card">
                <div class="card-label">Colleges and </br>Offices</div>
                <div class="card-value"><?php echo $collegeCount; ?></div>
            </div>
            <div class="data-card" id="event-card">
                <div class="card-label">Registered </br>Events</div>
                <div class="card-value"><?php echo $eventCount; ?></div>
            </div>
            <div class="data-card" id="games-card">
                <div class="card-label">Games </br>Played</div>
                <div class="card-value" ><?php echo $gamesCount; ?></div>
            </div>
        </div>

        <div id="charts-container">
        <div class="chart-container"><h3>No. of Players per Position</h3><canvas id="positionChart"></canvas></div>
        <div class="chart-container"><h3>No. of Players per College/Office</h3><canvas id="collegeChart"></canvas></div>
        <div class="chart-container"><h3>No. of Players Played on SCUFAR3 2024</h3><canvas id="PlayersOnScufar"></canvas></div>
        <div class="chart-container"><h3>No. of Players Played on ASCU-SN 2024</h3><canvas id="ascusnCountChart"></canvas></div>
        <div class="chart-container"><h3>No. of Attacks, Blocks, and Aces on SCUFAR3 2024</h3><canvas id="scufarStatsChart"></canvas></div>
        <div class="chart-container"><h3>No. of Attacks, Blocks, and Aces on ASCU-SN 2024</h3><canvas id="ascusnStatsChart"></canvas></div>
    </div>
    </div>

    <div id="bg-modal"></div>
    <div id="modal"></div>
</body>

</html>