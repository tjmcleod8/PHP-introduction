<?php

//database variables
$servername = "localhost";
$username = "root";
$password = "cite30153";
$db="equipmentdb";

// get the q parameter from URL
$serial = $_REQUEST["serial"];
$serial = strtoupper($serial);

$exists = "";
$serialArray = [];

// *********************************************Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// *********************************************Check connection
if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}
//echo "Connected to DB server <br />";

// *********************************************Query Statement
if($serial != ""){
    $query = "select serial_number from equipment where serial_number = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $serial);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    foreach ($rows as $row) {
        array_push($serialArray, $row["serial_number"]);
    }  
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

/* free result set */
$result->close();

/* close connection */
$conn->close();

// lookup all sn from array if $serial is different from ""
if ($serial !== "") {
    if(count($serialArray) == 0){
        $exists = "No";
    }
    foreach($serialArray as $sn) {
        if (stristr($serial, $sn)) {
        $exists = "Yes";
        break;
        }else{
            $exists = "No";
        }
    }
}

// Output "no" if no Serial Number matched array or "yes" if Serial Number did match one in database
if($exists == "Yes"){
    echo $exists . ": Please enter another SN";
}else{
    echo $exists;
}

?>