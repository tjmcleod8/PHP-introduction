<html>
    <head>
        <title>Equipment Results</title> 
        <?php echo "<link rel='stylesheet' href='/jacques/css/style.css'>"; ?>
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
            $AmountMin = null;
            $AmountMax = null;

            extract($_GET);	//changes query variables

            // *********************************************Create connection
            $conn = mysqli_connect($servername, $username, $password, $db);

            // *********************************************Check connection
            if (!$conn) {
                die("Connection failed: ".mysqli_connect_error());
            }
            //echo "Connected to DB server <br />";

            // *********************************************define print table function
            function printTable($result){
                print "<table border='3'>";
                print "<tr> <th>Edit</th> <th>Delete</th><th>Serial Number</th> <th>Computer Name</th> <th>Owner</th>" .
                    "<th>Room</th> <th>Asset Type</th> <th>Allocation</th> <th>Make</th> <th>Model</th>" .
                    "<th>Purchase Date</th> <th>Replacement</th> <th>Replacement Year</th> <th>Cost</th>" . 
                    "</tr> <tr>";
                $counter = 0;
                while ($row = mysqli_fetch_assoc($result)) { 	//Fetch records
                    foreach ($row as $k => $v) {
                        if($counter % 14 == 0){
                            print "</tr> <tr><td><a href='update.php?serialNumber=" . $row['serial_number'] . 
                            "'>EDIT</a></td> <td><a href='delete.php?serialNumber=" . $row['serial_number'] . "'>DELETE</a></td>";
                            $counter++;
                            $counter++;
                        }
                        print "<td>$v</td>";
                        $counter++;
                    }
                }
                print "</table>";
                return;
            }

            // *********************************************Create SQL query
            if($serialNumber != null){ //query 1
                $serialNumber = trim($serialNumber);
                if($serialNumber == "*"){
                    $query = "select * from equipment order by Rm, owner";
                    $stmt = $conn->prepare($query);
                    print "<h2> Equipment by Serial Number: All equipment</h2>";
                }else{
                    $query = "select * from equipment where serial_number like ?";
                    $stmt = $conn->prepare($query);
                    print "<h2> Equipment by Serial Number: " . $serialNumber . "</h2>";
                    $stmt->bind_param("s", $serialNumber);
                }
                $stmt->execute();
                $result = $stmt->get_result();
                printTable($result);
            }elseif($cmpName != null){ //query 2
                $query = "select * from equipment where cmp_name like ? order by owner";
                $stmt = $conn->prepare($query);
                $cmpName = trim($cmpName);
                print "<h2> Equipment by Computer Name: " . $cmpName . "</h2>";
                $stmt->bind_param("s", $cmpName);
                $stmt->execute();
                $result = $stmt->get_result();
                printTable($result);
            }elseif($Lname != null){ //query 3
                $query = "select * from equipment where owner like ? order by rm";
                $stmt = $conn->prepare($query);
                $Lname = trim($Lname);
                print "<h2> Equipment by Owner: " . $Lname . "</h2>";
                $Lname = "%" . $Lname . "%";
                $stmt->bind_param("s", $Lname);
                $stmt->execute();
                $result = $stmt->get_result();
                printTable($result);
            }elseif($RmNum != null){ //query 4
                $RmNum = trim($RmNum); //remove any leading or trailing spaces
                print "<h2> Equipment by Room number: " . $RmNum . "</h2>";
                $rmarray = explode(" ", $RmNum); //split by spaces
                $query = "select * from equipment where rm like ? order by cmp_name";
                $stmt = $conn->prepare($query);
                if(count($rmarray) == 2){ //if there was a space
                    $RmNum = $rmarray[0] . "%" . $rmarray[1];
                }else{ //if there was no space
                    $letterArray = str_split($RmNum); //put chars into array
                    $RmNum = $letterArray[0] . $letterArray[1] . $letterArray[2] . "%" . $letterArray[3];
                }
                $stmt->bind_param("s", $RmNum);
                $stmt->execute();
                $result = $stmt->get_result();
                printTable($result);
            }elseif($Asset != null){ //query 5
                $query = "select * from equipment where asset_type like ? order by owner";
                $stmt = $conn->prepare($query);
                $Asset = trim($Asset);
                print "<h2> Equipment by Asset Type: " . $Asset . "</h2>";
                $stmt->bind_param("s", $Asset);
                $stmt->execute();
                $result = $stmt->get_result();
                printTable($result);
            }elseif($Allocation != null){ //query 6
                $query = "select * from equipment where allocation like ? order by owner";
                $stmt = $conn->prepare($query);
                $Allocation = trim($Allocation);
                print "<h2> Equipment by Allocation: " . $Allocation . "</h2>";
                $stmt->bind_param("s", $Allocation);
                $stmt->execute();
                $result = $stmt->get_result();
                printTable($result);
            }elseif($Make != null){ //query 7
                $query = "select * from equipment where make like ? order by cmp_name";
                $stmt = $conn->prepare($query);
                $Make = trim($Make);
                print "<h2> Equipment by Make: " . $Make . "</h2>";
                $stmt->bind_param("s", $Make);
                $stmt->execute();
                $result = $stmt->get_result();
                printTable($result);
            }elseif($Model != null){ //query 8
                $query = "select * from equipment where model like ? order by cmp_name";
                $stmt = $conn->prepare($query);
                $Model = trim($Model);
                print "<h2> Equipment by Model: " . $Model . "</h2>";
                $Model = "%" . $Model . "%";
                $stmt->bind_param("s", $Model);
                $stmt->execute();
                $result = $stmt->get_result();
                printTable($result);
            }elseif($PurchaseDate != null){ //query 9
                $PurchaseDate = strval($PurchaseDate); //convert value to string
                print "<h2> Equipment by year purchased: " . $PurchaseDate . "</h2>";
                $PurchaseDate = "%" . $PurchaseDate; 
                $query = "select * from equipment where purchase_date like ? order by purchase_date";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("s", $PurchaseDate);
                $stmt->execute();
                $result = $stmt->get_result();
                printTable($result);
            }elseif($Repl != null){ //query 10
                $query = "select * from equipment where repl like ? order by owner";
                $stmt = $conn->prepare($query);
                $Repl = trim($Repl);
                print "<h2> Equipment by Replacement: " . $Repl . "</h2>";
                $stmt->bind_param("s", $Repl);
                $stmt->execute();
                $result = $stmt->get_result();
                printTable($result);
            }elseif($ReplYr != null){ //query 11
                $query = "select * from equipment where repl_yr like ? order by owner";
                $stmt = $conn->prepare($query);
                $ReplYr = trim($ReplYr);
                $ReplYr = "FY" . $ReplYr; 
                print "<h2> Equipment by Replacement Year: " . $ReplYr . "</h2>";
                $stmt->bind_param("s", $ReplYr);
                $stmt->execute();
                $result = $stmt->get_result();
                printTable($result);
            }elseif($AmountMin != null || $AmountMax != null){ //query 12
                $query = "select * from equipment where amount > ? and amount < ? order by amount";
                $stmt = $conn->prepare($query);
                if($AmountMin == null){
                    $AmountMin = 0.0;
                }elseif($AmountMax == null){
                    $AmountMax = 9999999.99;
                }
                $stmt->bind_param("dd", $AmountMin, $AmountMax);
                print "<h2> Equipment by Cost Range from " . $AmountMin . " to " . $AmountMax . "</h2>";
                $stmt->execute();
                $result = $stmt->get_result();
                printTable($result);
            }

            // *********************************************Execute SQL query
            function execute($conn, $stmt){
                if ($result = mysqli_query($conn, $stmt)) {
                    //echo "Executed SQL statement <br /><br />";
                } else {
                    die("Error executing SQL statement: ".mysqli_error($conn));
                }
                return $result;
            }

            // *********************************************Delete row
            function delete($conn, $sn){
                $query = "delete from equipment where serial_number = ?";
                $stmt = $conn->prepare($query);
                $serialNumber = trim($sn);
                $stmt->bind_param("s", $serialNumber);
                $stmt->execute();
            }

            mysqli_free_result($result); // free result set
            mysqli_close($conn); // close connection

            echo "<br /> <a href='/jacques/index.html'>Click here to search another set!</a>";
        ?> 
    </body>
</html>