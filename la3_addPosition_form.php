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
    <title>Add New Position</title>
    <link rel="stylesheet" href="addform.css">
    <link rel="stylesheet" href="navbar.css">
</head>

<body>
    <div class="display">
        <div class="header">
            <h1>Add a Position</h1>
        </div>

        <form method="post" enctype="multipart/form-data" action="la3_addPosition_process.php">
            <div class="form-section">
                <h2>Position Details</h2>
                <div class="form-group">
                    <label for="poscode">Position Code:</label>
                    <input type="text" name="poscode" id="poscode" required>
                </div>
                <div class="form-group">
                    <label for="posdesc">Description:</label>
                    <input type="text" name="posdesc" id="posdesc" required>
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
