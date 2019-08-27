<?php include('login789.php'); 
if(empty($_SESSION['username'])){
  header('location: MainPage.html');
}

?>
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
  .bs-example{
    margin: 20px;
  }
  * {
  box-sizing: border-box;
}

.content {
  position: absolute;
  bottom: 0;
  background: rgb(0, 0, 0); /* Fallback color */
  background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
  color: #f1f1f1;
  width: 100%;
  padding: 20px;
}
  /*@media screen and (max-width: 480 px){
    .screen{
      width: 100%;
    }
  }*/
</style>

</head>
<link rel="stylesheet" type="text/css" href="style.css">
<body>
  <header style="background-image: url(medicines.jpg); min-height: 250px; position: relative;">
    <div class="content">
      <h1 style="font-family: georgia; text-align: center;"> RUDRA MEDICO </h1>
    <i style="font-size: 15px"><p style="font-family: Book Antiqua;text-align: center;">Chemist & Drugist</p></i>
    <b><i style="font-size: 20px"><p style="font-family: times new roman;text-align: center;">Medical and General Store </p></i></b>

</div>
  </header>

  <div class="header">
    <nav class="navbar navbar-expand-sm bg-success navbar-dark">
      <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="main.html" target="frame">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="homepage.html" target="frame">About Us</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" target="frame" href="cart.php">Products</a>
          <a class="dropdown-item" target="frame" href="medicines.php">Medicine</a>
        </div> 
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html" target="frame">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="enquiry.html" target="frame">Enquiry</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="shrutika/index(2).php" target="frame">FAQ's</a>
        </li>
      </ul>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
     <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <span class="navbar-text">Welcome:<strong><?php echo $_SESSION['username']; ?></strong></span>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="MainPage.php?logout='1'"><i class="fa fa-fw fa-user"></i> Logout</a>
      </li>
    </ul>
  </div>
  
</nav>
</div>
<!-- <div class="row">
  <div class="card">
    <h2>Who we are?</h2>
    
    <p>We are amongst India's top company in the category of of Chemists. We are also known for Ayurvedic Medicine Shops.</p>
    
    <div class="card">
      <h2>TITLE HEADING</h2>
      <h5>Title description, Sep 2, 2017</h5>
    
      <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
    </div>
  </div>
-->
<iframe id='frame' name='frame' style="width:100%; height:55vh; float:left; align:center;"> </iframe>
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
  </footer> -->
</body>
</html>
