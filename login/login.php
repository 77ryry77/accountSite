<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log In</title>
    </head>
    <body>

        <?php
            //starts the session
            session_start();

            //gets the user info given by the login forms
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["password"] = $_POST["password"];

            //basic server/database access info
            $servername = "localhost";
            $susername = "root";
            $spassword = "";
            $dbname = "users";

            // Create connection
            $conn = new mysqli($servername, $susername, $spassword, $dbname);
            // Check connection
            if ($conn->connect_error)
            {
                die("Connection failed: " . $conn->connect_error);
            }

            //sql for getting the rest of the users info
            $sql = "SELECT id, uemail, upassword, uname, ulname, ufname FROM accounts";
            $result = $conn->query($sql);

            //variable to keep track of wether the user succefully logged into 
            //an account or failed to login at previous step
            $logsequence = false;

            /*
            logging in script
            compares the given username and password info to the info in the database
            if there is a match $loggedin is set to true and the while loop stops
            */
            if ($result->num_rows > 0)
            {
                //set each rows data to the $row variable
                while($row = $result->fetch_assoc())
                {
                    //checks whether the email the user entered matches the one in the current row
                    if($row["uemail"] == $_SESSION["email"])
                    {
                        //checks if the password entered by the user matches the password of this row
                        if($row["upassword"] == $_SESSION["password"])
                        {
                            $logsequence = true;
                            //adds all user information to the session
                            $_SESSION["userid"] = $row["id"];
                            $_SESSION["useremail"] = $row["uemail"];
                            $_SESSION["userpassword"] = $row["upassword"];
                            $_SESSION["username"] = $row["uname"];
                            $_SESSION["userfname"] = $row["ulname"];
                            $_SESSION["userlname"] = $row["ulname"];
                            header("Location: ../message/index.php");
                            break;
                        }
                        //since the email and password given are not correct redirects to failed login
                        else
                        {
                            $logsequence = true;
                            $_SESSION["issue"] = "badmatch";
                            header("Location: index.php");
                            break;
                        }
                    }
                }
                //if the user entered email does not match any in the data base redirect to failed login
                if($logsequence == false)
                {
                    $_SESSION["issue"] = "bademail";
                    header("Location: index.php");
                }
            } 
            else
            {
                echo "Error";
            }
            $conn->close();
        ?>
    </body>
</html>
