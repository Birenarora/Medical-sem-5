<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Products</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script>
   function check() {

    var x = document.f1.quantity.value;
    var y = document.f1.price.value;

    if (document.f1.prodid.value == ""){
      alert("ID should not be empty")
      return false;
    }
    if (document.f1.prodname.value == ""){
      alert("Name should not be empty")
      return false;
    }
    if (x == "" && isNaN(x) || x < 0){
      alert("Quantity should not be empty and negative")
      return false;
    }
    if (document.f1.prodtype.value == ""){
      alert("Type should not be empty")
      return false;
    }
    if (y == "" && isNaN(y) || y < 0){
      alert("Price should not be empty and negative")
      return false;
    }
    return true;
  }
</script>
<style>
.bs-example{
    margin: 20px;
  }
/*@media screen and (max-width: 600px) {
  input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
}*/
</style>
</head>
<body>
  <h4 align="center">ADD A PRODUCT</h4>
  <form name="f1" action="ConnInsert.php" onsubmit="return check()" method="POST">
   <table cellpadding="15px" align="center">
    <tr>
     <th>Product ID</th>
     <td><input type = "text" class="form-control" name = "prodid" size="50%" placeholder=" Enter Product ID">
     </td>
   </tr>

   <tr>
     <th>Prod Name</th>
     <td><input type = "text" class="form-control" name = "prodname" size="50%" placeholder=" Enter Product Name">
     </td>
   </tr>

   <tr>
     <th>Quantity</th>
     <td><input type = "text" class="form-control" name = "quantity" size="50%" placeholder=" Enter Quantity">
     </td>
   </tr>

   <tr>
     <th>Product Type</th>
     <td><input type = "text" class="form-control" name = "prodtype" size="50%" placeholder=" Enter type of Product">
     </td>
   </tr>

   <tr>
     <th>Price</th>
     <td><input type = "text" class="form-control" name = "price" size="50%" placeholder=" Enter the Price">
     </td>
   </tr>

   <tr>
     <th>Image</th>
     <td><input type = "file" name="image">
     </td>
   </tr>

 </table>
 <center><input type = "submit" class="btn btn-info" name = "submit" value = "Submit">
  <input type = "submit" class="btn btn-info" name = "Submit" value = "Back" onclick="tp.html"></center>
</form>
</center>
</body>
</html>
