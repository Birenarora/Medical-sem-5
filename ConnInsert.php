<?php 
$dbconn = mysqli_connect("localhost","root","","biren");
if($dbconn)
  echo ("Successful!! ");
else
  echo ("Could not connect");
$prodid = $_POST['prodid'];
$prodname = $_POST['prodname'];
$quantity = $_POST['quantity'];
$prodtype = $_POST['prodtype'];
$price = $_POST['price'];
$image = $_POST['image'];

$sql = "insert into product values('$prodid','$prodname','$quantity','$prodtype','$price','$image')";  
$res = mysqli_query($dbconn,$sql);
if ($res)
  echo "<script type='text/javascript'> window.alert('Record Inserted Successfully');window.location.href='http://localhost/InP/ProdAdd.php';</script>";
?>  