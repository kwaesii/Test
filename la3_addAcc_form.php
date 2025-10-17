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
    <title>Add New Account</title>
    <link rel="stylesheet" href="addform.css">
    <link rel="stylesheet" href="navbar.css">
</head>

<body>
    <div class="display">
        <div class="header">
            <h1>Add an Account</h1>
        </div>

        <form method="post" enctype="multipart/form-data" action="la3_addAcc_process.php">

            <!-- Account Details Section -->
            <div class="form-section">
                <h2>Account Details</h2>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                </div>
            </div>

            <!-- Personal Information Section -->
            <div class="form-section">
                <h2>Personal Information</h2>
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" id="firstName" required>
                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" id="lastName" required>
                </div>
            </div>


            <!-- Player Information Section -->
            <div class="form-section">
                <h2>Player Information</h2>
                <div class="form-group">
                    <label for="jersey_num">Jersey No.:</label>
                    <input type="number" name="jersey_num" id="jerseyNo" required>
                    <label for="profile_picture">Profile Picture:</label>
                    <input type="file" accept="image/*" name="profilePicture" id="profilePicture" required >
                </div>
                <div class="form-group">
                    <label for="position">Position:</label>
                    <select name="position" id="position_">
                        <?php
                        $posRes = $conn->query("SELECT * FROM position ORDER BY position_code");
                        foreach ($posRes as $posRow) {
                            $posCode = $posRow['position_code'];
                            $posDesc = $posRow['position_desc'];
                            echo "<option value='$posCode'>($posCode) $posDesc</option>";
                        }
                        ?>
                    </select>
                    <label for="college_office">College/Office:</label>
                    <select name="college_office" id="col_off">
                        <?php
                        $colOffRes = $conn->query("SELECT * FROM college_office ORDER BY college_code");
                        foreach ($colOffRes as $colOffRow) {
                            $colOffCode = $colOffRow['college_code'];
                            $colOffDesc = $colOffRow['college_desc'];
                            echo "<option value='$colOffCode'>($colOffCode) $colOffDesc</option>";
                        }
                        ?>
                    </select>
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