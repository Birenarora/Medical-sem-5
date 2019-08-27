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
    $Name = $_POST["patname"];
    $Address = $_POST["patadd"];
    $Phone_no = $_POST["patcontact"];
    
    $sql = " UPDATE patient set patname='".$Name."',patadd='".$Address."',patcontact='".$Phone_no."' where patid='$ID' ";
    if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'> window.alert('Record Updated Successfully');window.location.href='http://localhost/InP/shrutika/mn.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

?>