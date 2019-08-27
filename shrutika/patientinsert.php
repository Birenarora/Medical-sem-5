<?php
$cid = $cname = $cadd = $ccontact = "";
$received = NULL;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID = clean_input($_POST["patid"]);
    $Name = clean_input($_POST["patname"]);
    $Address = clean_input($_POST["patadd"]);
    $Phone_no = clean_input($_POST["patcontact"]);
    

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "biren";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $stmt = $conn->prepare("INSERT INTO patient (patid, patname, patadd, patcontact) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("dssd", $ID, $Name, $Address, $Phone_no);    
    $stmt->execute();
    $stmt->close();
    $conn->close();
    echo "<script type='text/javascript'> window.alert('Record Inserted Successfully');window.location.href='http://localhost/InP/shrutika/shrutikapatient.html';</script>";
    
}

function clean_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>