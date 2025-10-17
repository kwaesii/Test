<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="jquery-3.7.1.min.js"></script>
    <script src="login.js"></script>

</head>
<body>
    <div id="display"> 
    <form id="login-form" method="post" action="la3_dashboard.php">
            <h1>Login</h1>
            <label for="email"></i>EMAIL ADDRESS</label><br/>

            <div class="input-container" id="email-text">
            <i class="fa-solid fa-envelope" id="email-icon"></i>
            <input type="email" name="email" id="email" placeholder="e.g. juan.delacruz@gmail.com" autocomplete="off">
            </div>

            <label for="password"></i>PASSWORD</label><br/>

            <div class="input-container" id="pass-icon">
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="••••••••••••">
            </div>

            <input type="checkbox" name="remember" id="remember">
            <label for="remember">REMEMBER ME</label>
            
            <div id="login">
            <div id="login-button"><span>LOG IN</span></div>
            </div>

            <div id="register">
            <label for="register"></i>Don't have an account?</label>
            <a href='register.html' target="_blank">Create an account.</a>
            </div>
            <!-- <a href='forgot.html' target="_blank">FORGOT PASSWORD</a> -->
            
        </form>
    </div>
    
    
</body>
</html>
