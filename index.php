<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form</title>
    </head>
    <body>
        <?php 
            session_start();
            $_SESSION["issue"] = "none";
        ?>
        <a href="login/index.php">Login</a>
        <a href="create/index.php">Create</a>
    </body>
</html>