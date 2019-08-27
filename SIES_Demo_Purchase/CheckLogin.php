<?php
    session_start();
    if(isset($_SESSION['user'])){
        header("location: http://localhost/SIES_Demo_Purchase/Purchase.php"); 
    }
    $userId = $password = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userId = clean_input($_POST["userId"]);
        $password = clean_input($_POST["password"]);
      
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "siespythonclass";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        $sql = "SELECT password from user where user_id ='" .$userId . "'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $pwd = $row['password'];
        if (strcmp($pwd, $password)){
            echo 'Login Successful';            
            $_SESSION['user']= $userId;
            header("location: http://localhost/SIES_Demo_Purchase/Purchase.php"); 
        }else{
            header("location: http://localhost/SIES_Demo_Purchase/Login.php"); 
            echo $pwd . ' ' . $password;
        }
        
        $conn->close();
    }

    function clean_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>