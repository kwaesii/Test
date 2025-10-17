<?php include_once "la3_connection.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit A Position</title>
    <script src="navbar.js"></script>
    <link rel="stylesheet" type="text/css" href="editform.css">
</head>

<body>
    <div class="display">
        <div class="header">
            <h1>Edit Position</h1>
        </div>
        <form id="editPositionForm" method="post" action="la3_editPosition_process.php">
            <?php
            $position_code = $_GET['position_code'];
            $result = $conn->query("SELECT * FROM position WHERE position_code='$position_code'");
            $row = $result->fetch_assoc();
            ?>
            <input type="hidden" name="original_poscode" value="<?php echo $position_code; ?>">

            <div class="form-section">
                <h2>Position Information</h2>
                <div class="form-group">
                    <label for="poscode">Position Code:</label>
                    <input type="text" name="poscode" value="<?php echo $row['position_code']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="posdesc">Description:</label>
                    <input type="text" name="posdesc" value="<?php echo $row['position_desc']; ?>">
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
