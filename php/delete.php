<html>
    <head>
        <title>Equipment Results</title> 
        <?php //echo "<link rel='stylesheet' href='/jacques/css/style.css'>"; ?>
    </head>
    <body class="php">
        <?php
            //database variables
            $servername = "localhost";
            $username = "root";
            $password = "cite30153";
            $db="equipmentdb";

            //query variable
            $serialNumber = null;
            extract($_GET);	//changes query variable

            // *********************************************Create connection
            $conn = mysqli_connect($servername, $username, $password, $db);

            // *********************************************Check connection
            if (!$conn) {
                die("Connection failed: ".mysqli_connect_error());
            }
            //echo "Connected to DB server <br />";

            // *********************************************Create SQL query
            $query = "delete from equipment where serial_number = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $serialNumber);

            // *********************************************Execute SQL query
            try{
                $stmt -> execute();
                echo "Record deleted successfully";
            } catch(Exception $e) {
                echo "Error deleting record: " . $e;
            }
            
            mysqli_close($conn); // close connection

            echo "<br /> <a href='/jacques/index.html'>Click here to search equipment!</a>";
        ?> 
    </body>
</html>