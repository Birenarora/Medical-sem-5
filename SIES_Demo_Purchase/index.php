<!DOCTYPE html>
<html>
<head>
  <title>Upload your files</title>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['user'])){
            header("location: http://localhost/SIES_Demo_Purchase/Purchase.php"); 
        }
    ?>
    <form action="CheckLogin.php" method="POST">
    <p>Login Details</p>
    <table>
        <tr>
            <td> User ID </td>
            <td> <input type="text" name="userId"> </td>
        </tr>
        <tr>
            <td> Password </td>
            <td> <input type="password" name="password"> </input></td>
        </tr>
        <tr>
            <td> </td>
            <td> <input type="submit" value="Login"></input> </td>
        </tr>
    </table>    
  </form>
</body>
</html>