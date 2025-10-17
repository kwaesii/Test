<?php include_once "la3_connection.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit An Event</title>
    <script src="navbar.js"></script>
    <link rel="stylesheet" type="text/css" href="editform.css">
</head>

<body>
    <div class="display">
        <div class="header">
            <h1>Edit Event</h1>
        </div>
        <form id="editEventForm" method="post" action="la3_editEvent_process.php">
            <?php
            $event_code = $_GET['event_code'];
            $result = $conn->query("SELECT * FROM events WHERE event_code='$event_code'");
            $row = $result->fetch_assoc();
            ?>
            <input type="hidden" name="original_event_code" value="<?php echo $event_code; ?>">

            <div class="form-section">
                <h2>Event Information</h2>
                <div class="form-group">
                    <label for="event_code">Event Code:</label>
                    <input type="text" name="event_code" value="<?php echo $row['event_code']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="event_desc">Description:</label>
                    <input type="text" name="event_desc" value="<?php echo $row['event_desc']; ?>">
                </div>
                <div class="form-group">
                    <button type="submit">Update Record</button>
                </div>
            </div>
        </form>
        <button id="close" type="button">x</button>
    </div>
</body>

</html>
