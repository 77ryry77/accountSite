<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
    </head>
    <body>
        <a href="../index.php">Home</a>
        <h1>Login</h1>
        <?php
            session_start();
            if($_SESSION["issue"] == "badmatch")
            {
                echo '<h6>Email and Password Do Not Match</h6>';
            }
            elseif($_SESSION["issue"] == "bademail")
            {
                echo '<h6>Account Does Not Exist</h6>';
            }
        ?>
        <form method = "post" action = "login.php">
            <input name = "email" type = "email" placeholder="Email" />
            <input name = "password" type = "password" placeholder="Password" />
            <input name = "submit" type = "submit" value = "submit" />
        </form>
    </body>
</html>