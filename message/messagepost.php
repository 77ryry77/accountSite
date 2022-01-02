<!DOCTYPE html>
<html lang="en">
    <?php 
        session_start();

        //basic database access info
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

        //gets the user-name and message from the POST and stores them
        $username = $_POST["username"];
        $message = $_POST["message"];
        //sql for adding the post to the data base
        $sqlm = "INSERT INTO messages (uname, umessage) VALUES ('".$username."','".$message."')";

        //add post to the data base
        if ($conn->query($sqlm) === TRUE) 
        {
            header("Location: index.php");
        } 
        else 
        {
            echo "Error: " . $sqlm . "<br>" . $conn->error;
        }
    
    ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Post</title>
    </head>
    <body>
        <p>If you see this message please go back to the homepage.</p>
    </body>
</html>