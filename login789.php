<?php
	session_start();
 //    if(isset($_SESSION['username'])){
 //        header("location: http://localhost/InP/tp.html"); 
 //    }
$username = $password = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    require "connectivity.php";
    
    $sql = "SELECT * from login1 where username ='" .$username. "' and password='".$password."'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($username == $row['username'] && $password == $row['password']){
            $_SESSION['username']= $username;
        header("location: http://localhost/InP/MainPage.php");        
        
    }elseif ($username == 'admin' && $password == 'admin') {
        header("location: http://localhost/InP/tp.html");
    }
    else{
        echo "<script type='text/javascript'> window.alert('Login UnSuccessful');window.location.href='http://localhost/InP/MainPage.html';</script>";
        // echo"<style width='92%' margin='0px auto' padding='10px' border='1px solid #a94442' color='#a94442' background='#f2dede' border-radius='5px'>Invalid Username/Password</style>";
    }
    $conn->close();
}
if(isset($_GET['logout']))
    {
        session_destroy();
        unset($_SESSION['username']);
        header('location: http://localhost/InP/MainPage.html');
    }
?>