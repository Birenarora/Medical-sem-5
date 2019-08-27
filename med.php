<html>
    <head>
        <meta charset="UTF-8">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

        <title></title>
    </head>
    <body>
        
        <?php
            session_start();
            $user_id = $_SESSION['username'];
            echo 'Welcome : ' . $user_id . '<br>';
            
           //Define the products and cost

    require "connectivity.php";
    $sql = "SELECT pname,price from minsert";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $products = array($row["pname"]);
            $amounts = array($row["price"]);   
        }
    } else {
        echo "0 results";
    }
            // $products = array("product A", "product B", "product C");
            // $amounts = array("19.99", "10.99", "2.99");

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
        <?php
        echo "<table>";
            echo "<tr>";
            for ($i=0; $i< count($products); $i++) {
                
                echo "<td>";
                echo '<div class="card" style="width:200px">';                                                
                echo '<img class="card-img-top" src="" alt="Card image" style="width:100%">';
                echo '<div class="card-body">';
                    echo '<h4 class="card-title">' . $products[$i] . '</h4>';
                    echo '<p class="card-text">' . $amounts[$i]. '</p>';
                    echo '<a href="?add=<?php echo($i); ?>">Add to cart</a>';
                echo '</div>';                
                echo '</div>';
                echo "</td>";
                ?>
            <!-- <td><?php echo($products[$i]); ?></td>
            <td><?php echo($amounts[$i]); ?></td>
            <td><a href="?add=<?php echo($i); ?>">Add to cart</a></td> -->
        
        <?php
            }
        ?>
        <tr>
            <td colspan="5"></td>
        </tr>
        <tr>
            <td colspan="5"><a href="?reset=true">Reset Cart</a></td>
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
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
        <?php
                $total = 0;
                foreach ( $_SESSION["cart"] as $i ) {
        ?>
                    <tr>
                        <!-- <td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["mname"]; ?></td>
                    <td><?php echo $item["code"]; ?></td> -->
                    <td style="text-align:right;"><?php echo ( $products[$_SESSION["cart"][$i]] ); ?></td>
                    <td style="text-align:right;"><?php echo ( $_SESSION["qty"][$i] ); ?></td>                   
                    <td  style="text-align:right;"><?php echo ( $_SESSION["amounts"][$i] ); ?></td>
                    <td style="text-align:center;"><a href="?delete=<?php echo($i); ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
                        <!-- <td><?php echo( $products[$_SESSION["cart"][$i]] ); ?></td>
                        <td><?php echo( $_SESSION["qty"][$i] ); ?></td>
                        <td><?php echo( $_SESSION["amounts"][$i] ); ?></td>
                        <td><a href="?delete=<?php echo($i); ?>">Delete from cart</a></td> -->
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