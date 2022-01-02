<!DOCTYPE html>
<html lang="en">
    <?php
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $passwordverify = $_POST["passwordverify"];

        $servername = "localhost";
        $susername = "root";
        $spassword = "";
        $dbname = "users";

        // Create connection
        $conn = new mysqli($servername, $susername, $spassword, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT id, uemail, uname FROM accounts";
        $result = $conn->query($sql);


        $success = FALSE;
        //user info validation makes sure the passwords match, the username is available and the email is available
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                //checks to make sure the username and email are not already in use
                if($row["uemail"] == $email)
                {
                    header("Location: failedcreateinuse.html");
                }
                elseif($row["uname"] == $username)
                {
                    header("Location: failedcreateinuse.html");
                }
                //checks to make sure the passwords are the same
                elseif($password != $passwordverify)
                {
                    header("Location: failedcreatepassword.html");
                }
                else{
                    $success = TRUE;
                    break;
                }
            }
            if($success == TRUE)
            {
                // sql to add new user to the database
                $sql = "INSERT INTO accounts (uname, ufname, ulname, uemail, upassword)
                VALUES ('$username', '$fname', '$lname', '$email', '$password')";
                
                if ($conn->query($sql) === TRUE) {
                echo "New account created successfully";
                } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                }
                echo "<br /><a href='login.html'>Login</a>";
            }

        } else {
            echo "Error";
        }
        $conn->close();
    ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Account</title>
    </head>
    <body>
        
    </body>
</html>