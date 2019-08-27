<html>
<head>
    <title>Patient</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">        
</head>
<body>
    <form id='form1' method="POST" action="shrutikaaup.php">
        <table id='table_form'>
            <tr>
                <td>ID </td>  <td><input type="text" name="patid" id="patid"> </td>
            </tr>
            <tr>
                <td>Name </td>  <td><input type="text" name="patname" id="patname"> </td>
            </tr>
            <tr>
                <td>Address </td> <td><input type="text" name="patadd" id="patadd"> </td>
            </tr>
            <tr>
                <td>Phone.no </td> <td><input type="text" name="patcontact" id="patcontact"> </td>
            </tr>
            <tr>
                <td> </td> <td><input type="submit" value="Update"> <input type="submit" formaction="shrutikadel.php" value="Delete"></td>
            </tr>
        </table>
    </form>

    <?php
    $patname = $patadd  = $patcontact = "";
    $received = NULL;

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "biren";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * from patient";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table id='table1' style='border: 1px solid black;'>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["patid"] . "</td>";
            echo "<td>" . $row["patname"] . "</td>";
            echo "<td>" . $row["patadd"] . "</td>";
            echo "<td>" . $row["patcontact"] . "</td>";
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
                document.getElementById('patid').value = this.cells[0].innerHTML;
                document.getElementById('patname').value = this.cells[1].innerHTML;
                document.getElementById('patadd').value = this.cells[2].innerHTML;
                document.getElementById('patcontact').value = this.cells[3].innerHTML;
              
            }
        }
    </script>
</body>
</html>