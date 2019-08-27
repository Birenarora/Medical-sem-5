<?php
$servername='localhost';
$uname='root';
$passwd='';
$dbname='biren';
$conn=new mysqli($servername,$uname,$passwd,$dbname);
if($conn->connect_error)
{
	die("Connection failed;".$conn->connect_error);
}
?>