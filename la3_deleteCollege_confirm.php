<?php
$college_code = $_GET['college_code'] ?? '';
$college_desc = $_GET['college_desc'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addform.css"> 
    <link rel="stylesheet" href="navbar.css">
    <script src="navbar.js"></script>
    <title>Delete College Record</title>
</head>
<body>
<div class="display">
    <div class="header">
        <h1>Delete College</h1>
    </div>
    
    <div class="form-section">
        <p class="message">Are you sure you want to delete the record of <b><?php echo "$college_desc ($college_code)"; ?></b>?</p>
        
        <div class="form-group" style="justify-content: center; gap: 20px; margin-top: 30px;">
            <form method="POST" action="la3_deleteCollege_process.php">
                <input type="hidden" name="college_code" value="<?php echo htmlspecialchars($college_code); ?>">
                <button type="submit" class="btn delete">Delete</button>
            </form>
            
            <button type="button" id="cancel-delete" class="btn cancel">Cancel</button>
        </div>
    </div>
</div>
</body>
</html>
