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
  <style type="text/css">
    table{
            text-align:center;
            border-collapse: collapse;
            padding-top: 10px;
            float: center;
        }
        table,th,td{
            border: 1px solid black;
            padding: 10px;
        }
        #med1 {
    float: right;
}
        #med3{
            float: left;
        }
</style>

</head>
<link rel="stylesheet" type="text/css" href="style.css">
<body style="background-color: #C9FFBF;">
<div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
    <center>
    <?php
    $mname = $mtype = $mfgdate = $expdate = $price = $quantity = "";
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
        echo "<table>";
        echo "<tr style='background-color:red; color:white;'>";
        echo "<th>ID</th>";
        echo "<th>Medicine Name</th>";
        echo "<th>Medicine Type</th>";
        echo "<th>Price</th>";
        echo "<th>Details</th>";
        echo "</tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["mid"] . "</td>";
            echo "<td>" . $row["mname"] . "</td>";
            echo "<td>" . $row["mtype"] . "</td>";
            echo "<td>" . $row["price"] . "</td>";
            echo "<td><a href='http://cdsco.nic.in/writereaddata/National%20List%20of%20Essential%20Medicine-%20final%20copy.pdf' style='color:red;'>More</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
    </center>
</div>
<div class="col-md-6">
    <h2 style="">Medicine</h2>

<p><img src="med1.gif" id="med1" style="width:200px;height:170px;margin-left:15px;border: 1px solid black;">
Medicine is the science and practice of the diagnosis, treatment, and prevention of disease. Medicine encompasses a variety of health care practices evolved to maintain and restore health by the prevention and treatment of illness. Contemporary medicine applies biomedical sciences, biomedical research, genetics, and medical technology to diagnose, treat, and prevent injury and disease, typically through pharmaceuticals or surgery, but also through therapies as diverse as psychotherapy, external splints and traction, medical devices, biologics, and ionizing radiation, amongst others.[1]
<img src="med2.gif" id="med3" style="width:200px;height:170px;margin-right:15px;border: 1px solid black;">
Medicine has existed for thousands of years, during most of which it was an art (an area of skill and knowledge) frequently having connections to the religious and philosophical beliefs of local culture. For example, a medicine man would apply herbs and say prayers for healing, or an ancient philosopher and physician would apply bloodletting according to the theories of humorism. In recent centuries, since the advent of modern science, most medicine has become a combination of art and science (both basic and applied, under the umbrella of medical science). While stitching technique for sutures is an art learned through practice, the knowledge of what happens at the cellular and molecular level in the tissues being stitched arises through science. </p>
</div>
</div>
</div>
      <!-- <footer class="bg">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Your Website 2016</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer> -->
   </body>
   </html>
