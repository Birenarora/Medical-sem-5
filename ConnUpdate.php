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
    $prodname = $_POST["prodname"];
    $quantity = $_POST["quantity"];
    $prodtype = $_POST["prodtype"];
    $price = $_POST["price"];
    $sql = " UPDATE product set prodname='".$prodname."', quantity='".$quantity."', prodtype='".$prodtype."', price='".$price."' where prodid='$prodid' ";
    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'> window.alert('Record Updated Successfully');window.location.href='http://localhost/InP/ProdModify.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

?>