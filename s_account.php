<?php
session_start();
if( !isset( $_SESSION['email']) ){
echo "You are not authorized to view this page. Go back <a href= '/'>home</a>";
exit();
}
require 's_header.php'
?>



<?php 
require 's_db_key.php';
$email=$_SESSION['email'] ;
$sql = "SELECT * FROM seller where email='$email'"; 
$conn = connect_db();
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$sid = $row["sid"];

$sql="SELECT * FROM seller where email='$email'";
$conn = connect_db();
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$name = $row["name"];
?>




<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="HOMEPAGE.css">

   <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' >


   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

 <style>
   
   .container {
  position: relative;
}

/* Bottom right text */
.text-block {
  position: absolute;
  bottom: 200px;
  right: 50px;
  background-color: black;
  color: white;
  padding-left: 20px;
  padding-right: 20px;
}

 </style>

</head>
	
<body>

<nav class="navbar navbar-expand-lg navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <li><a class="btn btn-outline-info" href="HOMEPAGE.php"><i class="fas fa-store" style="color:black;">&nbsp;<h4>APNA BAZAAR</h4></i></a></li>  
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="s_account.php" class="btn-inline-info"><i class="fas fa-home" style="color:black;"><h4>HOME</h4></i></a></li>
      
       <li ><a href="p_register.php" class="btn-inline-info"><i class="fas fa-shopping-cart" style="color:black;"><h4>Register New Products</h4></i></a></li>
        <li ><a href="disp_products.php" class="btn-inline-info"><i class="fas fa-check" style="color:black;"><h4>MY PRODUCTS</h4></i></a></li>

        <li ><a href="s_pending_orders.php" class="btn-inline-info"><i class="fas fa-check" style="color:black;"><h4>PENDING PRODUCTS</h4></i></a></li>
        <li ><a href="profit.php" class="btn-inline-info"><i class="fas fa-chart-bar" style="color:black;"><h4>Profit</h4></i></a></li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
       <li ><a href="sign_in_as.php" class="btn-inline-info"><i class="fa fa-sign-out"style="color:black;"><h4>LOGOUT</h4></i></a></li>
       <li><a><i class="fas fa-user"style="color:black;"><h4><?php  echo $name ?></h4></i></a></li>
      
    </ul>
  </div>
</nav>


<div class="container">
  <img src="Homemade.jpg" alt="image" style="width:100%; ">
  <div class="text-block">
    <hr style="color:white;"><h3>WELCOME TO APNA BAZAAR MR./MRS.<?php echo $name; ?></h3><hr>
  </div>
</div>

<div class="footer" align="center">

       <a href="#"><i class="fa fa-facebook-official"></i></a>
       <a href="https://in.pinterest.com/"><i class="fa fa-pinterest-p"></i></a>
       <a href="#"><i class="fa fa-twitter"></i></a>
       <a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a>
       <a href="https://www.youtube.com/"><i class="fa fa-youtube"></i></a>
        <p align="center">COPYRIGHT 2020 by MCOE</p> 
</div>
</body>

</html>