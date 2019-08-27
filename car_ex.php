<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Purchase</title>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <style>
    body {font-family: Arial, Helvetica, sans-serif;}    
        
    table {
    border-collapse: collapse;
    }

    table, th, td {
    border: 1px solid black;
    }    
        
    th {
    background-color: #4CAF50;
    color: white;    
    }
    
    tr:hover {background-color: #f5f5f5;}

    th, td {
    border-bottom: 1px solid #ddd;
    padding: 15px;
    text-align: left;
    }
    
    
    </style>
    </head>
    <body>

        <?php
         
        session_start();
        $user_id = $_SESSION['username'];
            echo 'Welcome : ' . $user_id . '<br>';
        
            
        $conn = mysqli_connect('localhost', 'root','', 'biren');   
        
        $stm=mysqli_query($conn,"select mname from example");
        $products=array();
        while($row=mysqli_fetch_array($stm)){
            $products[]=$row['mname'];
        }
            
            
        $stm1=mysqli_query($conn,"select price from example");
        $amounts= array();
        while($row1=mysqli_fetch_array($stm1)){
            $amounts[]=$row1['price'];
        }
            
            

            //Load up session
            if ( !isset($_SESSION["total"]) ) {
                $_SESSION["total"] = 0;
                for ($i=0; $i< count($products); $i++) {
                $_SESSION["qty"][$i] = 0;
                $_SESSION["amounts"][$i] = 0;
                }
            }
            
            //Reset
            if ( isset($_GET['reset']) )
            {
                if ($_GET["reset"] == 'true')
                {
                    unset($_SESSION["qty"]); //The quantity for each product
                    unset($_SESSION["amounts"]); //The amount from each product
                    unset($_SESSION["total"]); //The total cost
                    unset($_SESSION["cart"]); //Which item has been chosen
                }
            }
            
            //Checkout
            if ( isset($_GET['checkout']) )
            {
                if ($_GET["checkout"] == 'true')
                {
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "biren";

                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    
                    $temp = 1;
                    $stmt = $conn->prepare("INSERT INTO orderid (t1) VALUES (?)");
                    $stmt->bind_param("i", $temp);    
                    $stmt->execute();                    
                    $stmt->close();
                    
                    $sql = "SELECT max(id) as id from orderid";
                    $result = $conn->query($sql);
                    $r=$result->fetch_assoc();                    
                    $order_id = $r['id'];
                    
                    $total = 0;
                    foreach ( $_SESSION["cart"] as $i ) {
                        $stmt = $conn->prepare("INSERT INTO ordertable (product, user, quantity, amount, order_id) VALUES (?, ?, ?, ?, ?)");
                        $stmt->bind_param("ssidi", $products[$_SESSION["cart"][$i]],$_SESSION['username'], $_SESSION["qty"][$i], $_SESSION["amounts"][$i], $order_id);    
                        $stmt->execute();
                        $stmt->close();
                    }
                    $conn->close();
                }
            }
            
            //Add
   
            if ( isset($_GET["add"]) )
            {
                $i = $_GET["add"];
                $qty = $_SESSION["qty"][$i] + 1;
                $_SESSION["amounts"][$i] = $amounts[$i] * $qty;
                $_SESSION["cart"][$i] = $i;
                $_SESSION["qty"][$i] = $qty;
            }

             //Delete
             if ( isset($_GET["delete"]) )
            {
                $i = $_GET["delete"];
                $qty = $_SESSION["qty"][$i];
                $qty--;
                $_SESSION["qty"][$i] = $qty;
                //remove item if quantity is zero
                if ($qty == 0) {
                    $_SESSION["amounts"][$i] = 0;
                    unset($_SESSION["cart"][$i]);
                }
                else
                {
                    $_SESSION["amounts"][$i] = $amounts[$i] * $qty;
                }
            }
        ?>
        <h2>List of All Products</h2>
        <table>
            <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Action</th>
            </tr>
        <?php
            for ($i=0; $i< count($products); $i++) {
        ?>
            <tr>
            <td><?php echo($products[$i]); ?></td>
            <td><?php echo($amounts[$i]); ?></td>
            <td><a href="?add=<?php echo($i); ?>">Add to cart</a></td>
            </tr>
        <?php
            }
        ?>
        <tr>
            <td colspan="5"></td>
        </tr>
        <tr>
            <td colspan="5"><a href="?reset=true">Reset Cart</a></td>
            <td colspan="5"><a href="?checkout=true">Checkout</a></td>
        <td><a href="#" style="color:dodgerblue">Logout</a></td>
        </tr>
        </table>
        <?php
            if ( isset($_SESSION["cart"]) ) {
        ?>
            <br/><br/><br/>
            <h2>Cart</h2>
            <table>
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
        <?php
                $total = 0;
                foreach ( $_SESSION["cart"] as $i ) {
        ?>
                    <tr>
                        <td><?php echo( $products[$_SESSION["cart"][$i]] ); ?></td>
                        <td><?php echo( $_SESSION["qty"][$i] ); ?></td>
                        <td><?php echo( $_SESSION["amounts"][$i] ); ?></td>
                        <td><a href="?delete=<?php echo($i); ?>">Delete from cart</a></td>
                    </tr>
        <?php
                    $total = $total + $_SESSION["amounts"][$i];
        }
                    $_SESSION["total"] = $total;
        ?>
                    <tr>
                    <td colspan="7">Total : <?php echo($total); ?></td>
                    </tr>
            </table>
        <?php
            }
        ?>
    </body>
</html>