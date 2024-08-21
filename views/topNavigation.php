<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Connect 4</title>
    </head>
    
    <body>
        <header>
            <?php if(isset($_SESSION['client_info'])): ?>
                <a href="/connect-4">Home</a>
                <a href="login.php?action=logout">Sign Out</a>
            <?php else: ?>
                <a href="login.php">Login</a>
            <?php endif; ?>
        </header><br>
        <main>