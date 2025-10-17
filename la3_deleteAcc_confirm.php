<?php
$username = $_GET['username'];
$first_name = $_GET['first_name'];
$last_name = $_GET['last_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addform.css"> 
    <link rel="stylesheet" href="navbar.css">
    <script src="navbar.js"></script>
    <title>Delete a Record</title>
</head>
<body>
<div class="display">
    <div class="header">
        <h1>Delete Account</h1>
    </div>
    
    <div class="form-section">
        <p class="message">Are you sure you want to delete the record of <b><?php echo "$first_name $last_name ($username)"; ?></b>?</p>
        
        <div class="form-group" style="justify-content: center; gap: 20px; margin-top: 30px;">
            <form method="GET" action="la3_deleteAcc_process.php" style="display: inline;">
                <input type="hidden" name="username" value="<?php echo $username; ?>">
                <button type="submit" class="btn delete">Delete</button>
            </form>
            
            <button type="button" id="cancel-delete" class="btn cancel">Cancel</button>
        </div>
    </div>
</div>
</body>
</html>
