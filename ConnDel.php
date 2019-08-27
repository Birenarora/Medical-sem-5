<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biren";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prodid = $_POST["prodid"];
    $sql = "DELETE from product WHERE prodid='$prodid'";
    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'> window.alert('Record Deleted Successfully');window.location.href='http://localhost/InP/ProdModify.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

?>