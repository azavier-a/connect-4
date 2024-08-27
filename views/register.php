<!DOCTYPE html>

<?php include('topNavigation.php')?>
    <h2 id="login-register-title">Register Account</h2>
    
    <p id='login-register-feedback'>
        <?php echo $register_feedbackmsg?>
    </p>
    
    <form action="register.php" method="POST" id="login-register-form">
        <label>Username:</label>
        <input type="text" name="username"/><br>
        
        <label>Email Address:</label>
        <input type="email" name="email_address"/><br>
        
        <label>Password:</label>
        <input type="password" name="password"/><br>
        
        <input type="submit" value="Register"/>
    </form>
    
<?php include('footer.php')?>