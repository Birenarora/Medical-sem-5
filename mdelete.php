<?php
require "connectivity.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pname = $_POST["pname"];
    $sql = " DELETE from medicine WHERE mname='$pname' ";
    if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'> window.alert('Record Deleted Successfully');window.location.href='http://localhost/InP/m.php';</script>";
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