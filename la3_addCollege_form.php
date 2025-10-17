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
    <title>Add New College</title>
    <link rel="stylesheet" type="text/css" href="addform.css">
    <link rel="stylesheet" href="navbar.css">
</head>

<body>
    <div class="display">
        <div class="header">
            <h1>Add a College</h1>
        </div>
        <form action="la3_addCollege_process.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="college_code">College/Office/Campus Code:</label>
                <input type="text" name="colcode" id="colcode" required><br>
            </div>
            <div class="form-group">
                <label for="college_desc">Description:</label>
                <input type="text" name="coldesc" id="coldesc" required><br>
            </div>
            <div class="form-group">
                <button type="submit">Save Record</button>
            </div>
        </form>
        <button id="close">x</button>
    </div>
</body>

</html>