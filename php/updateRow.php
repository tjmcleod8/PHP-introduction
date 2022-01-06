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

            //query variables
            $serialNumber = null;
            $cmpName = null;
            $Lname = null;
            $RmNum = null;
            $Asset = null;
            $Allocation = null;
            $Make = null;
            $Model = null;
            $PurchaseDate = null;
            $Repl = null;
            $ReplYr = null;
            $Amount = null;

            extract($_GET);	//changes query variables


            // *********************************************prepare inputs for database            
            if($serialNumber != null){
                $serialNumber = strtoupper($serialNumber);
            }
            if($cmpName != null){
                $cmpName = strtoupper($cmpName);
            }
            if($Lname != null){
                $Lname = strtoupper($Lname);
            }
            if($Asset != null){
                $Asset = strtoupper($Asset);
            }
            if($Allocation != null){
                $Allocation = strtoupper($Allocation);
            }
            if($Make != null){
                $Make = strtoupper($Make);
            }
            if($Model != null){
                $Model = strtoupper($Model);
            }
            if($ReplYr != null){
                $ReplYr = "FY" . $ReplYr;
            }
            if($Repl == "No"){
                $ReplYr = "NOT ELIGIBLE";
            }
            

            //echo("$serialNumber, $cmpName, $Lname, $RmNum, $Asset, $Allocation, $Make, $Model, $PurchaseDate, $Repl, $ReplYr, $Amount");

            // *********************************************Create connection
            $conn = mysqli_connect($servername, $username, $password, $db);

            // *********************************************Check connection
            if (!$conn) {
                die("Connection failed: ".mysqli_connect_error());
            }
            //echo "Connected to DB server <br />";

            // *********************************************Create SQL query
            $query = "update equipment set cmp_name=?, owner=?, rm=?, asset_type=?, " .
            "allocation=?, make=?, model=?, purchase_date=?, repl=?, repl_yr=?, amount=? " . 
            "where serial_number = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssssssssssds", $cmpName, $Lname, $RmNum, $Asset, $Allocation,
                $Make, $Model, $PurchaseDate, $Repl, $ReplYr, $Amount, $serialNumber);

            // *********************************************Execute SQL query
            try{
                $stmt -> execute();
                echo "Record edited successfully";
            } catch(Exception $e) {
                echo "Error editing record: " . $e;
            }
            
            mysqli_close($conn); // close connection

            echo "<br /> <a href='/jacques/index.html'>Click here to search equipment!</a>";
        ?> 
    </body>
</html>