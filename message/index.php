<!DOCTYPE html>
<html lang="en">
    <?php
        // Start the session
        session_start();

        //get all the variables from the post
        $new = "no";
        $email = $_SESSION["useremail"];
        $username = $_SESSION["username"];
        $id = $_SESSION["userid"];
        $fname = $_SESSION["userfname"];
        $lname = $_SESSION["userlname"];

        //basic database access info
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
    ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog</title>
        <style>
            #message{
                border: 3px solid black;
                margin: 10px;
            }
        </style>
    </head>
    <body>
        <!--Refreshes the page by linking to this current page-->
        <a href="index.php">Refresh</a>

        <br />

        <!--Form for logging out-->
        <a href="../index.php">Log Out</a>
        
        <br />

        <!--Posts-->
        <?php
            //sql for getting blog post info
            $sql = "SELECT id, uname, umessage FROM messages";
            $result = $conn->query($sql);
    
            //loop through each post and add it to the page as a message
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<div id='message'>";
                    echo "<p>".$row["umessage"]."</p>";
                    echo "<p>- ".$row["uname"]."</p>";
                    echo "</div>";
                }
            } else {
                echo "Error";
            }
        ?>
        <!--New Post Form -->
        <form method = "post" action = "messagepost.php">
            <input name = "username" type = "text" value=<?php echo '"'.$_SESSION["username"].'"'?> readonly/>
            <input name = "message" type = "text" placeholder="Message" />
            <input name = "submit" type = "submit" value = "Post" />
        </form>
    </body>
</html>