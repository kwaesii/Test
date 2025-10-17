<?php include_once "la3_connection.php"; ?>
<?php session_start();
if (isset($_SESSION['form_error'])) {
    echo "<script>alert('" . addslashes($_SESSION['form_error']) . "');</script>";
    unset($_SESSION['form_error']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Event</title>
    <link rel="stylesheet" href="addform.css">
    <link rel="stylesheet" href="navbar.css">
</head>
<body>
    <div class="display">
        <div class="header">
            <h1>Add an Event</h1>
        </div>

        <form method="post" enctype="multipart/form-data" action="la3_addEvent_process.php">
            <div class="form-section">
                <h2>Event Details</h2>
                <div class="form-group">
                    <label for="event_code">Event Code:</label>
                    <input type="text" name="event_code" id="event_code" required>
                </div>
                <div class="form-group">
                    <label for="event_desc">Description:</label>
                    <input type="text" name="event_desc" id="event_desc" required>
                </div>
                <div class="form-group">
                    <button type="submit">Save Record</button>
                </div>
            </div>
        </form>
        <button id="close">x</button>
    </div>
</body>
</html>
