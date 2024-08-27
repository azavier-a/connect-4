<!DOCTYPE html>

<?php include('topNavigation.php')?>
    <h2 id="login-register-title">Login</h2>
    
    <p id='login-register-feedback'>
        <?php echo $login_error?>
    </p>
    
    <form action="login.php" method="POST" id="login-register-form">
        <label>Email Address:</label>
        <input type="text" name="email_address"/><br>
        
        <label>Password:</label>
        <input type="password" name="password"/><br>
        
        <input type="submit" value="Login"/><br>
        
        <p id='register-account-text'>New user?&nbsp;<a href="register.php">Register Account</a></p>
    </form>
    
<?php include('footer.php')?>