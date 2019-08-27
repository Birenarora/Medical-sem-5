<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rudra Medico</title>
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
  <style type="text/css">
  .bs-example{
    margin: 20px;
  }
  #tr_hover:hover{
        background-color: skyblue;
    }
    #table1{
      text-align: center;
    }
  </style>

</head>
<link rel="stylesheet" type="text/css" href="style.css">
<body>
  <br>
  <h4 align="center"> MODIFY PRODUCTS </h4>
  <form name='f1' action="ConnUpdate.php" method="POST" onsubmit="return check()">
    <center>
      <table cellpadding="15px" align="center" id='table_form'>
        <tr>
          <th>Product ID </th>  <td><input type="text" class="form-control" name="prodid" id="prodid" size="50%" placeholder=" Enter Product ID"> </td>
        </tr>
        <tr>
          <th>Product Name </th>  <td><input type="text" class="form-control" name="prodname" id="prodname" size="50%" placeholder=" Enter Product Name"> </td>
        </tr>
        <tr>
          <th>Quantity </th> <td><input type="text" class="form-control" name="quantity" id="quantity" size="50%" placeholder=" Enter Quantity"> </td>
        </tr>
        <tr>
          <th>Product Type </th> <td><input type="text" class="form-control" name="prodtype" id="prodtype" size="50%" placeholder=" Enter Product Type"> </td>
        </tr>
        <tr>
          <th>Price </th> <td><input type="text" class="form-control" name="price" id="price" size="50%" placeholder=" Enter Price"> </td>
        </tr>
      </table>
      <input type = "submit" class="btn btn-info button1" name = "update" value = "Update" formaction="ConnUpdate.php">
      <input type = "submit" class="btn btn-info button2" name = "delete" value = "Delete" formaction="ConnDel.php">
    </form>
  </center>

  <?php
  $prodname = $quan = $prodtype = $price = "";
  $received = NULL;

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "biren";

  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "SELECT * from product";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    echo "<center>";
    echo "<br>";
    echo "<h4 style='font-family:georgia'> PRODUCTS </h4>";
    echo "<table id='table1' style='border: 1px solid black;'>";
    echo "<tr style='background-color:yellow; color:black;'>";
    echo "<th style='border: 1px solid black'>Product ID</th>";
    echo "<th style='border: 1px solid black'>Product Name</th>";
    echo "<th style='border: 1px solid black'>Quantity</th>";
    echo "<th style='border: 1px solid black'>Product Type</th>";
    echo "<th style='border: 1px solid black'>Price</th>";
    echo "<th style='border: 1px solid black'>Image</th>";
    echo "</tr>";
    while($row = $result->fetch_assoc()) {
      echo "<tr id='tr_hover' style='border: 1px solid black'>";
      echo "<td style='border: 1px solid black'>" . $row["prodid"] . "</td>";
      echo "<td style='border: 1px solid black'>" . $row["prodname"] . "</td>";
      echo "<td style='border: 1px solid black'>" . $row["quantity"] . "</td>";
      echo "<td style='border: 1px solid black'>" . $row["prodtype"] . "</td>";
      echo "<td style='border: 1px solid black'>" . $row["price"] . "</td>";
      echo "<td style='border: 1px solid black'> <img src = '" . $row["image"] . "' style='width:50px;height:40px;'></td>";
      echo "</tr>";
    }
    echo "</table>";
    echo "</center>";
  } else {
    echo "<center>";
    echo "0 results";
    echo "</center>";
  }
  $conn->close();
  ?>        

  <script type='text/javascript'>
    let table = document.getElementById('table1'), iIndex;
    for(let i = 0; i < table.rows.length; i++){
      table.rows[i].onclick = function() {
        rIndex = this.rowIndex;
        document.getElementById('prodid').value = this.cells[0].innerHTML;
        document.getElementById('prodname').value = this.cells[1].innerHTML;
        document.getElementById('quantity').value = this.cells[2].innerHTML;
        document.getElementById('prodtype').value = this.cells[3].innerHTML;
        document.getElementById('price').value = this.cells[4].innerHTML;
        document.getElementById('image').value = this.cells[5].innerHTML;
      }
    }
  </script>
</body>
</html>