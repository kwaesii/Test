<?php
$position_code = $_GET['position_code'] ?? '';
$position_desc = $_GET['position_desc'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addform.css"> 
    <link rel="stylesheet" href="navbar.css">
    <script src="navbar.js"></script>
    <title>Delete Position Record</title>
</head>
<body>
<div class="display">
    <div class="header">
        <h1>Delete Position</h1>
    </div>
    
    <div class="form-section">
        <p class="message">Are you sure you want to delete the record of <b><?php echo "$position_desc ($position_code)"; ?></b>?</p>
        
        <div class="form-group" style="justify-content: center; gap: 20px; margin-top: 30px;">
            <form method="POST" action="la3_deletePosition_process.php">
                <input type="hidden" name="position_code" value="<?php echo htmlspecialchars($position_code); ?>">
                <button type="submit" class="btn delete">Delete</button>
            </form>
            
            <button type="button" id="cancel-delete" class="btn cancel">Cancel</button>
        </div>
    </div>
</div>
</body>
</html>
