<?php
$pid = $pname = $ptype = $mfgdate = $expdate = $price = $quantity = "";
$received = NULL;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pid = clean_input($_POST["pid"]);
    $pname = clean_input($_POST["pname"]);
    $ptype = clean_input($_POST["ptype"]);
    $mfgdate = clean_input($_POST["mfgdate"]);
    $expdate = clean_input($_POST["expdate"]);
    $price = clean_input($_POST["price"]);
    $quantity = clean_input($_POST["quantity"]);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "biren";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $stmt = $conn->prepare("INSERT INTO medicine (mid, mname, mtype, mfgdate, expdate, price, quantity) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("dssssdd", $pid, $pname, $ptype, $mfgdate, $expdate, $price, $quantity);    
    $stmt->execute();
    $stmt->close();
    $conn->close();
    echo "<script type='text/javascript'> window.alert('Record Inserted Successfully');window.location.href='http://localhost/InP/n1.html';</script>";
    
}

function clean_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!-- <?php
require "connectivity.php";

        $pid = $_POST["pid"];
        $pname = $_POST["pname"];
        $ptype = $_POST["ptype"];
        $mfgdate = $_POST["mfgdate"];
        $expdate = $_POST["expdate"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];
$sql1="insert into minsert values('$pid',$pname','$ptype','$mfgdate','$expdate','price',$quantity)";
$res1=$conn->query($sql1);
if (res1) {
    # code...
    alert("Inserted");
}
?> -->