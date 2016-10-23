<?php
echo "Nieuw cadeautje toevoegen!<br />";
$van = $_GET['van'];
$voor = $_GET['voor'];
$servername = "localhost";
$username = "root";
$password = "";
$database = "cadeautjes";
$voorfamilie = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$sql = "SELECT id, familie FROM personen WHERE id='$voor'";

$result = $conn->query($sql);
if (mysqli_query($conn, $sql)) {
    while($row = $result->fetch_assoc()) {
        $voorfamilie = $row['familie'];
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br />";
}


$sql = "DELETE FROM cadeautjes WHERE van='$van' AND voor='$voor' LIMIT 1";

if (mysqli_query($conn, $sql)) {
    echo "Cadeautje succesvol verwijderd!<br />";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br />";
}

$sql = "UPDATE lastchanged SET tijd=NOW(), laatste=TRUE WHERE familie='$voorfamilie'";

if (mysqli_query($conn, $sql)) {
    echo "Tijd upgedate<br />";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br />";
}

$sql = "UPDATE lastchanged SET laatste=FALSE WHERE familie<>'$voorfamilie'";

if (mysqli_query($conn, $sql)) {
    echo "Tijd upgedate<br />";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br />";
}

mysqli_close($conn);
echo "Redirecting!";

header('Location: ' . $_SERVER["HTTP_REFERER"] );
?>