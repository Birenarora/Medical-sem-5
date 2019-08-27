<?php
session_start();
$connect = mysqli_connect("localhost","root","","biren");
if (isset($_POST["add_to_cart"])){
	if(isset($_SESSION["shopping_cart"])){
		$item_array_id = array_column($_SESSION["shopping_cart"],"item_id");
		if(!in_array($_GET["mid"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array('item_id'=>$_GET["mid"],'item_name'=>$_POST["hidden_name"],'item_price'=>$_POST["hidden_price"],'item_quantity'=>$_POST["quantity"]);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else{
			echo "<script>alert('Item Already Added')</script>";
			echo "<script>window.location='cart.php'</script>";
		}
	}
	else{
		$item_array = array('item_id'=>$_GET["mid"],'item_name'=>$_POST["hidden_name"],'item_price'=>$_POST["hidden_price"],'item_quantity'=>$_POST["quantity"]);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["mid"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo "<script>alert('Item Removed')</script>";
				echo "<script>window.location='cart.php'</script>";
			}
		}
	}
}
?>	
<!DOCTYPE html>
<html>
<head>
  <title>SHOPPING CART</title>
  <link rel="stylesheet" type="text/css" href="style1.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #C9FFBF;">
  <div id="product-grid">
  <?php 
    if(isset($_SESSION["username"])){
      echo "<h5 style='float:right; margin:10px;'>Welcome:".$_SESSION["username"]."</h5>";
    }
   ?>
  
  <div class="txt-heading"><h4>Products</h4></div>
  <?php
  $query = "select * from example order by mid asc";
  $result = mysqli_query($connect,$query);
  if (mysqli_num_rows($result) > 0){
   while ($row = mysqli_fetch_array($result)) {
    ?><div class="container">
     <div class="product-item">
       <form method="post" action="cart.php?action=add&mid=<?php echo $row["mid"]; ?>">
         <div class="product-image"><img src="<?php echo $row["image"]; ?>" style="width: 200px; height: 200px;"></div>
         <div class="product-tile-footer">
           <div class="product-title"><?php echo $row["mname"]; ?></div>
           <div class="product-price">$ <?php echo $row["price"]; ?></div>
           <div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" />
             <input type="hidden" name="hidden_name" value="<?php echo $row["mname"]; ?>" />
             <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
             <input type="submit" name="add_to_cart" class="btn btn-success" value="Add to Cart" />
           </div>
         </div>
       </form>
     </div>
     </div>
 </div>
   <?php
 }
}
?>
<div style="clear: both;"></div><br>
<div id="product-grid">
<h3>Order Details</h3>
<div class="table-responsive">
 <table class="table table-bordered">
  <tr>
   <th width="40%">Item Name</th>
   <th width="10%">Quantity</th>
   <th width="20%">Price</th>
   <th width="15%">Total</th>
   <th width="5%">Action</th>
 </tr>
 <?php
 if(!empty($_SESSION["shopping_cart"])){
  $total = 0;
  foreach ($_SESSION["shopping_cart"] as $keys => $values) {
    ?>	
    <tr>
      <td><?php echo $values["item_name"]; ?></td>
      <td><?php echo $values["item_quantity"]; ?></td>
      <td>$ <?php echo $values["item_price"]; ?></td>
      <td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
      <td><a href="cart.php?action=delete&mid=<?php echo $values["item_id"]; ?>"><img src="icon-delete.png" alt="Remove Item" /></a></td>
    </tr>
    <?php
    $total += ($values["item_quantity"] * $values["item_price"]);
  }
  ?>
  <tr>
   <td colspan="3" align="right">Total</td>
   <td align="right">$ <?php echo number_format($total, 2); ?></td>
   <td></td>
 </tr>
 <?php
}  				
?>
</table>
</div>
</div>

<!--   <footer class="bg">
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
  </footer>
-->
</body>
</html>
