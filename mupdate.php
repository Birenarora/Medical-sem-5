<?php
require "connectivity.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pid = $_POST["pid"];
    $pname = $_POST["pname"];
    $ptype = $_POST["ptype"];
    $mfgdate = $_POST["mfgdate"];
    $expdate = $_POST["expdate"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $sql = " UPDATE medicine set mname='".$pname."',mtype='".$ptype."',mfgdate='".$mfgdate."',expdate='".$expdate."',price='".$price."',quantity='".$quantity."' WHERE mid=$pid ";
    if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'> window.alert('Record Updated Successfully');window.location.href='http://localhost/InP/m.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

?>