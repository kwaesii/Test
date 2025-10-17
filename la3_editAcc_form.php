<?php include_once "la3_connection.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit An Account</title>
    <script src="navbar.js"></script>
    <link rel="stylesheet" type="text/css" href="editform.css">
</head>

<body>
    <div class="display">
        <div class="header">
            <h1>Edit Account</h1>
        </div>
        <form id="editAccForm" method="post" enctype="multipart/form-data" action="la3_editAcc_process.php">
            <?php
            $username = $_GET['username'];
            $result = $conn->query("SELECT * FROM account WHERE username='$username'");
            $row = $result->fetch_assoc();
            ?>
            <input type="hidden" name="username" value="<?php echo htmlspecialchars($username); ?>">

            <div class="form-section">
                <!-- Account Details Section -->
                <h2>Account Details</h2>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" value="<?php echo htmlspecialchars($row['username']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" value="<?php echo htmlspecialchars($row['password']); ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" class="email-field">
                </div>
            </div>

            <!-- Personal Information Section -->
            <div class="form-section">
                <h2>Personal Information</h2>
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" value="<?php echo htmlspecialchars($row['first_name']); ?>" class="half-width">

                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" value="<?php echo htmlspecialchars($row['last_name']); ?>" class="half-width">
                </div>
            </div>

            <!-- Player Information Section -->
            <div class="form-section">
                <h2>Player Information</h2>
                <div class="form-group">
                    <label for="jersey_num">Jersey No.:</label>
                    <input type="number" name="jersey_num" value="<?php echo htmlspecialchars($row['jersey_num']); ?>">

                    <label for="position">Position:</label>
                    <select name="position_code" id="position_">
                        <?php
                        $posRes = $conn->query("SELECT * FROM position ORDER BY position_code");
                        foreach ($posRes as $posRow) {
                            $posCode = $posRow['position_code'];
                            $posDesc = $posRow['position_desc'];
                            $selected = ($row['position_code'] == $posCode) ? 'selected' : '';
                            echo "<option value='$posCode' $selected>($posCode) $posDesc</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="college_office">College/Office:</label>
                    <select name="college_code" id="col_off">
                        <?php
                        $colOffRes = $conn->query("SELECT * FROM college_office ORDER BY college_code");
                        foreach ($colOffRes as $colOffRow) {
                            $colOffCode = $colOffRow['college_code'];
                            $colOffDesc = $colOffRow['college_desc'];
                            $selected = ($row['college_code'] == $colOffCode) ? 'selected' : '';
                            echo "<option value='$colOffCode' $selected>($colOffCode) $colOffDesc</option>";
                        }
                        ?>
                    </select>
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
