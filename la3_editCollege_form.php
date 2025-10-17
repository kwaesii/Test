<?php include_once "la3_connection.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit A College</title>
    <script src="navbar.js"></script>
    <link rel="stylesheet" type="text/css" href="editform.css">
</head>

<body>
    <div class="display">
        <div class="header">
            <h1>Edit College</h1>
        </div>
        <form id="editCollegeForm" method="post" action="la3_editCollege_process.php">
            <?php
            $college_code = $_GET['college_code'];
            $result = $conn->query("SELECT * FROM college_office WHERE college_code='$college_code'");
            $row = $result->fetch_assoc();
            ?>
            <input type="hidden" name="original_colcode" value="<?php echo $college_code; ?>">

            <div class="form-section">
                <h2>College Information</h2>
                <div class="form-group">
                    <label for="colcode">College/Office/Campus Code:</label>
                    <input type="text" name="colcode" value="<?php echo $row['college_code']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="coldesc">Description:</label>
                    <input type="text" name="coldesc" value="<?php echo $row['college_desc']; ?>">
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
