<?php 
$username = "";
$email = "";
$password = "";

$db = mysqli_connect('localhost','root','','biren');

if(isset($_POST['register'])){
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "insert into login1(username,email,password) values('$username','$email','$password')";
	mysqli_query($db,$sql);

	header('location: MainPage.html');
}
?>
