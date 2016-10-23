<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "cadeautjes";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$personen = array();
$cadeautjes = array(); // 0 = van, 1 = voor

$sql = "SELECT naam, familie FROM personen";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($personen, 
            array(
                $row['naam'],
                0,
                $row['familie']
            )
        );
    }
} else {
    echo "Error loading personen";
}




$sql = "SELECT cadeautjes.id, p.naam AS 'van', p2.naam AS 'voor' FROM `cadeautjes`
INNER JOIN personen AS p
ON cadeautjes.van = p.id
INNER JOIN personen AS p2
ON cadeautjes.voor = p2.id
";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($cadeautjes, array($row['van'], $row['voor']));
        foreach($personen as $key => $item){
            if($item[0] == $row['voor']){
                $personen[$key][1] += 1;
                break;
            }
        }
    }
} else {
    echo "0 results";
}

$lastchanged = array();
$sql = "SELECT * FROM lastchanged";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $time = strtotime($row['tijd']);
        $bla = date("D d F Y", $time);
        $lastchanged[$row['familie']] = $bla;
        if($row['laatste']){
            $lastchanged['laatste'] = $bla;   
        }
    }
} else {
    echo "0 results";
}



mysqli_close($conn);

?>