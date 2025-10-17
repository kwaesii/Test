<?php include_once "la3_connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to College Table</title>
    <link rel="stylesheet" type="text/css" href="table.css">
    <link rel="stylesheet" type="text/css" href="navbar.css">
    <script src="jquery-3.7.1.min.js"></script>
    <script src="navbar.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <nav class="navbar">
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
        <div class='add-record'>
            <button class='btn add' id='add-college'>+ Add Record</button>
        </div>

        <table border='1'>
            <tr>
                <th>College Code</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>

            <?php
            $query = "SELECT college_code, college_desc FROM college_office ORDER BY college_code ASC";
            $result = $conn->query($query);

            while ($row = $result->fetch_assoc()) {
                $college_code = $row['college_code'];
                $college_desc = $row['college_desc'];

                echo "
                <tr>
                    <td>$college_code</td>
                    <td>$college_desc</td>
                    <td>
                        <div class='btn-container'>
                            <div class='btn-wrapper'>
                                <button class='edit btn' data-college_code=\"$college_code\">Edit</button>
                            </div>
                            <div class='btn-wrapper'>
                                <button class='delete btn' data-college_code=\"$college_code\" data-college_desc=\"$college_desc\">Delete</button>
                            </div>
                        </div>
                    </td>
                </tr>";
            }
            ?>
        </table>
    </div>