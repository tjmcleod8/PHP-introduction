<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Equipment Manager</title>
        <link rel="stylesheet" href="/jacques/css/update.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javaScript" src="/jacques/js/validate.js"></script>
    </head>
    <body>
        <header>
            <img src="/jacques/images/equipmentIcon.jfif" alt="Equipment Manager">
            <h1>Equipment Manager</h1>
        </header>

        <main>
            <p>
                <?php 
                    //database variables
                    $servername = "localhost";
                    $username = "root";
                    $password = "cite30153";
                    $db="equipmentdb";

                    //query variables
                    $serialNumber = null;
                    $cmp_name = null;
                    $owner = null;
                    $rm = null;
                    $asset_type = null;
                    $allocation = null;
                    $make = null;
                    $model = null;
                    $purchase_date = null;
                    $repl = null;
                    $repl_yr = null;
                    $amount = null;

                    extract($_GET);	//changes query variables

                    // *********************************************Create connection
                    $conn = mysqli_connect($servername, $username, $password, $db);

                    // *********************************************Check connection
                    if (!$conn) {
                        die("Connection failed: ".mysqli_connect_error());
                    }
                    //echo "Connected to DB server <br />";
                    
                    $query = "select * from equipment where serial_number like ?"; //get the other serial number columns
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("s", $serialNumber);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    $row = mysqli_fetch_assoc($result);
                    extract($row); 	//Fetch records
                    
                    //output all html
                    echo "<table>" . "<form method='get' class='validate' action='updateRow.php' id='Update' onsubmit='return validate()'>";
                    echo "<tr><th>Serial Number:</th>
                    <td><input type='text' name='serialNumber' id='serialNumber' onfocus='this.blur()' value='" . $serialNumber . "'></td></tr>
                    <tr><th> Computer Name:</th>
                    <td><input type='text' name='cmpName' id='cmpName' value='" . $cmp_name . "'></td></tr>
                    <tr><th> Owner: </th>
                    <td><input type='text' name='Lname' id='Lname' value='" . $owner . "'></td></tr>
                    <tr><th> Room Number: </th>
                    <td><input type='text' name='RmNum' id='RmNum' value='" . $rm . "'></td></tr>
                    <tr><th> Asset Type: </th>
                    <td><input type='text' name='Asset' id='Asset' value='" . $asset_type . "'></td></tr>
                    <tr><th> Allocation: </th>
                    <td><input type='text' name='Allocation' id='Allocation' value='" . $allocation . "'></td></tr>
                    <tr><th> Make: </th>
                    <td><input type='text' name='Make' id='Make' value='" . $make . "'></td></tr>
                    <tr><th> Model: </th>
                    <td><input type='text' name='Model' id='Model' value='" . $model . "'></td></tr>
                    <tr><th> Purchase Date (MM/DD/YYYY): </th>
                    <td><input type='text' name='PurchaseDate' id='PurchaseDate' value='" . $purchase_date . "'></td></tr>
                    <tr><th> Replacement: </th>
                    <td><input type='text' name='Repl' id='Repl' value='" . $repl . "'></td></tr>
                    <tr><th> Replacement Year (Fiscal Year): </th>
                    <td><input type='text' name='ReplYr' id='ReplYr' value='" . $repl_yr . "'></td></tr>
                    <tr><th> Cost: </th>
                    <td><input type='text' name='Amount' id='Amount' value='" . $amount . "'></td></tr>
                    <tr><th></th>
                    <td><input class='submit' type='submit' value='SUBMIT'></td>" . "</form>";
                ?>
            </p>
        </main>
        <script type="text/javaScript" src="js/update.js"></script>
    </body>
    <footer>
        <br /> <a href='/jacques/index.html'>Click here to search another set!</a>
    </footer>
</html>
