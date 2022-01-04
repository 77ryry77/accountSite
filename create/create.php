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
        /*
        $i = 0;
        while ($i < 3){
            $row = $result->fetch_array(MYSQLI_BOTH);
            echo $row["uemail"];
            $i++;
        }*/
        //user info validation makes sure the passwords match, the username is available and the email is available
        if ($result->num_rows > 0) {
            // output data of each row
            $success = FALSE;
            for($i = 0; $i < $result->num_rows; $i++) {
                echo $i;
                $row = $result->fetch_array(MYSQLI_BOTH);
                //checks to make sure the username and email are not already in use
                echo $row["uemail"];
                echo $email;
                if($row["uemail"] == $email)
                {
                    header("Location: failedcreateinuse.php");
                    $success = TRUE;
                }
                elseif($row["uname"] == $username)
                {
                    header("Location: failedcreateinuse.php");
                    $success = TRUE;
                }
                //checks to make sure the passwords are the same
                elseif($password != $passwordverify)
                {
                    header("Location: failedcreatepassword.php");
                    $success = TRUE;
                }
            }
            if (!$success){
                // sql to add new user to the database
                $sql = "INSERT INTO accounts (uname, ufname, ulname, uemail, upassword)
                VALUES ('$username', '$fname', '$lname', '$email', '$password')";
                
                if ($conn->query($sql) === TRUE) {
                    echo "New account created successfully";
                    echo "<br /><a href='../login/login.html'>Login</a>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
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