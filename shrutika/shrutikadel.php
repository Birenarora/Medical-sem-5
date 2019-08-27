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
    $ID = $_POST["patid"];
    $sql = " DELETE from patient WHERE patid='$ID' ";
    if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'> window.alert('Record Deleted Successfully');window.location.href='http://localhost/InP/shrutika/mn.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

?>
<!-- <?php
require "connectivity.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rollno = $_POST['rollno'];
    $sql = " DELETE from login1 WHERE rollno='$rollno' ";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

?> -->