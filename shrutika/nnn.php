<?php
$cid = $cname = $cadd = $ccontact = "";
$received = NULL;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID = clean_input($_POST["cid"]);
    $Name = clean_input($_POST["cname"]);
    $Address = clean_input($_POST["cadd"]);
    $Phone_no = clean_input($_POST["ccontact"]);
    

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "biren";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $stmt = $conn->prepare("INSERT INTO customer (cid, cname, cadd, ccontact) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("dssd", $ID, $Name, $Address, $Phone_no);    
    $stmt->execute();
    $stmt->close();
    $conn->close();
    echo "<script type='text/javascript'> window.alert('Record Inserted Successfully');window.location.href='http://localhost/InP/shrutika/shrutika.html';</script>";
    
}

function clean_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>