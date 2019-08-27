<html>
<head>
    <title>Rudra Medical</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>  
    <style type="text/css" media="screen">
    .bs-example{
        margin: 20px;
    }
    #tr_hover:hover{
        background-color: skyblue;
    }
    @media screen and (max-width: 600px) {
        input[type=submit] {
          width: 75%;
          margin-top: 0;
      }
  }
</style>
<script type='text/javascript'>
    function validation(){

        var x = document.med.quantity.value;
        var y = document.med.price.value;

        var mfg = document.med.mfgdate.value;
        var exp = document.med.expdate.value;

        if (document.med.pid.value == ""){
            alert("Medicine ID should not be empty")
            return false;
        }
        if (document.med.pname.value == ""){
            alert("Medicine Name should not be empty")
            return false;
        }
        if (document.med.ptype.value == ""){
            alert("Medicine Type should not be empty")
            return false;
        }
        if (document.med.mfgdate.value == ""){
            alert("MFG Date should not be empty")
            return false;
        }
        if (exp < mfg){
            alert("Enter valid date!")
            return false;
        }
        if (y == "" && isNaN(y) || y < 0){
            alert("Price should not be negative or empty")
            return false;
        }
        if (x == "" && isNaN(x) || x < 0){
            alert("Quantity should not be negative or empty")
            return false;
        }
        return true;
    }
</script>
</head>
<body>
    <center>
        <form name='med' method="POST" action="mupdate.php">
            <div style="overflow-x: auto;">
                <table id='table_form'>
                    <h4 align="center">MEDICINE</h4>
                    <tr>
                        <th>Medicine ID </th><td><input type="text" name="pid" id="pid"> </td>
                    </tr>
                    <tr>
                        <th>Medicine Name </th><td><input type="text" name="pname" id="pname"> </td>
                    </tr>
                    <tr>
                        <th>Medicine Type </th><td><input type="text" name="ptype" id="ptype"> </td>
                    </tr>
                    <tr>
                        <th>MFG date </th><td><input type="date" name="mfgdate" id="mfgdate"> </td>
                    </tr>
                    <tr>
                        <th>EXP date </th><td><input type="date" name="expdate" id="expdate"> </td>
                    </tr>
                    <tr>
                        <th>Price </th> <td><input type="text" name="price" id="price"> </td>
                    </tr>
                    <tr>
                        <th>Quantity </th><td><input type="text" name="quantity" id="quantity"> </td>
                    </tr>
                </table>
                <br>
                <center><input type = "submit" class="btn btn-info" name = "submit" value = "Submit">
                  <input type = "submit" class="btn btn-info" name = "Submit" value = "Back" onclick="tp.html"></center>
              </div>
          </form>

          <?php
          $pname = $ptype = $mfgdate = $expdate = $price = $quantity = "";
          $received = NULL;

          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "biren";

          $conn = mysqli_connect($servername, $username, $password, $dbname);
          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * from medicine";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<center>";
            echo "<br>";
            echo "<h4 style='font-family:georgia'> Medicines </h4>";
            echo "<table id='table1' style='border: 1px solid black;'>";
            echo "<tr style='background-color:yellow; color:black;'>";
            echo "<th style='border: 1px solid black'>Medicine ID</th>";
            echo "<th style='border: 1px solid black'>Medicine Name</th>";
            echo "<th style='border: 1px solid black'>Medicine Type</th>";
            echo "<th style='border: 1px solid black'>MFG-Date</th>";
            echo "<th style='border: 1px solid black'>EXP-Date</th>";
            echo "<th style='border: 1px solid black'>Price</th>";
            echo "<th style='border: 1px solid black'>Quantity</th>";
            echo "</tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr id='tr_hover' style='border: 1px solid black'>";
                echo "<td style='border: 1px solid black'>" . $row["mid"] . "</td>";
                echo "<td style='border: 1px solid black'>" . $row["mname"] . "</td>";
                echo "<td style='border: 1px solid black'>" . $row["mtype"] . "</td>";
                echo "<td style='border: 1px solid black'>" . $row["mfgdate"] . "</td>";
                echo "<td style='border: 1px solid black'>" . $row["expdate"] . "</td>";
                echo "<td style='border: 1px solid black'>" . $row["price"] . "</td>";
                echo "<td style='border: 1px solid black'>" . $row["quantity"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>        

        <script type='text/javascript'>
            let table = document.getElementById('table1'), iIndex;
            for(let i = 0; i < table.rows.length; i++){
                table.rows[i].onclick = function() {
                    rIndex = this.rowIndex;
                    document.getElementById('pid').value = this.cells[0].innerHTML;
                    document.getElementById('pname').value = this.cells[1].innerHTML;
                    document.getElementById('ptype').value = this.cells[2].innerHTML;
                    document.getElementById('mfgdate').value = this.cells[3].innerHTML;
                    document.getElementById('expdate').value = this.cells[4].innerHTML;
                    document.getElementById('price').value = this.cells[5].innerHTML;
                    document.getElementById('quantity').value = this.cells[6].innerHTML;
                }
            }
        </script>
    </center>
</body>
</html>