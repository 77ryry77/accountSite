<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Account</title>
    </head>
    <body>
        <h1>Create A New Account</h1>
        <h3>Username Or Email Already In Use</h3>
        <form method = "post" action = "create.php">
            <input name = "fname" type = "text" placeholder="First Name" />
            <input name = "lname" type = "text" placeholder="Last Name" />
            <br /><br />
            <input name = "username" type = "text" placeholder = "Username" />
            <br /><br />
            <input name = "email" type = "email" placeholder = "Email" />
            <br /><br />
            <input name = "password" type = "password" placeholder = "Password" />
            <input name = "passwordverify" type = "password" placeholder = "Verify Password" />
            <br /><br />
            <input name = "submit" type = "submit" value = "submit" />
        </form>
    </body>
</html>