<?php

  session_start();
   $_SESSION['email'];
   $email=$_SESSION['email'] ;
  require 's_header.php';
  require 'b_db_key.php';
  $sql="SELECT * FROM buyer where email='$email'";
  $conn = connect_db();
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $name = $row["name"];

?>

<html>
   <title>
   	  PRODUCTS
   </title>
   <head>
   	   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
      <link rel="stylesheet" type="text/css" href="Homepage.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
   
    <link rel="stylesheet" href="HOMEPAGE.css">
    
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
     <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
      table {
            border-collapse: collapse;
            width: 100%;
            color: #588c7e;
            font-family: monospace;
            font-size: 18px;
            text-align: center;
            }
        th {
        background-color: #588c7e;
        color: white;
        }
        tr:nth-child(odd) {background-color: #f2f2f2}
       
    .fa {
  padding: 20px;
  font-size: 30px;
  width: 50px;
  text-align: center;
  text-decoration: none;
}
  
  .fa:hover {
  opacity: 0.7;
}


      .h3
      {
        font-family: monospace;
      } 

      .zoom {
  padding: 50px;
  background-color: transparent;
  transition: transform .2s; /* Animation */
  width: 200px;
  height: 200px;
  margin: 0 auto;
}

.zoom:hover {
  transform: scale(1.5);}
       
  .footer
    {
      background-color: #181818;
      width:100%;
      padding:30px;
      color: white;
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
      <li ><a href="HOMEPAGE.php" class="btn-inline-info"><i class="fas fa-home" style="color:black;"><h4>HOME</h4></i></a></li>
      <li class="dropdown">
          <a href="javascript:void(0)"  class="dropbtn"><i class="fas fa-th-list mt-2" style="color:black;"><h4>CATEGORY</h4></i></a>
          <div class="dropdown-content">
            <form action='b_retrive.php' method='POST'>
              <button class = 'btn btn-outline-info' class="fas fa-food" type = 'submit' value = 'FOODS' name= 'FOODS'><h4><i class="fas fa-apple-alt" style="color:black;">&nbsp;FOODS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></h4></button><br>
              
              <button class = 'btn btn-outline-info' type = 'submit' value = 'PERSONAL_CARE' name= 'PERSONAL_CARE'><h4><i class="fas fa-spa" style="color:black;">&nbsp;PERSONAL CARE</i></h4></button><br>
              
              <button class = 'btn btn-outline-info' type = 'submit' value = 'FASHION' name= 'FASHION'><h4><i class="fas fa-tshirt" style="color:black;">&nbsp;FASHION</i></h4></button><br>
              
             
             
           </form>
          </div>
      </li>
       <li ><a href="show_cart.php" class="btn-inline-info"><i class="fas fa-shopping-cart" style="color:black;"><h4>MY CART</h4></i></a></li>
        <li ><a href="my_orders.php" class="btn-inline-info"><i class="fas fa-check" style="color:black;"><h4>PLACED ORDERS</h4></i></a></li>
        <li>

            <form class="navbar-form pull-left" role="search" action=<?php      
               $search_url='p_search.php'; echo $search_url; ?> method="post">
            <div class="input-group">
               <input type="text" class="form-control" placeholder="Search for products" name="q">
            <div class="input-group-btn">
                  <button type="submit" class="btn btn-default" name="submit"> .
                    <span class="glyphicon glyphicon-search"></span>
                  </button>
               </div>
            </div>
          </form>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li ><a href="sign_in_as.php" class="btn-inline-info"><i class="fa fa-sign-out"style="color:black;"><h4>LOGOUT</h4></i></a></li>
      <li><a><i><h4><?php  echo $name ?></h4></i></a></li>
    </ul>
  </div>
</nav>


<?php
	$conn = connect_db();
if(isset($_POST['submit'])) {
	$q=$_POST['q'];
} 

else {
	printf("No search Result found");
	$q='';
}

$sql="SELECT * FROM products WHERE p_name like '%$q%' OR category like '%$q%'";
$result = $conn->query($sql);
	$sql = $result->fetch_assoc();
	if($sql)
	{
		echo "<table>";
            echo "<tr>";
            	echo "<th>&nbsp&nbsp &nbsp&nbsp </th>";
                echo "<th>&nbsp&nbsp PRODUCT ID &nbsp&nbsp</th>";
                echo "<th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp PRODUCT NAME &nbsp&nbsp </th>";
                echo "<th>&nbsp&nbsp CATEGORY &nbsp&nbsp</th>";
                echo "<th>&nbsp&nbsp SELLER ID &nbsp&nbsp</th>";
                echo "<th>&nbsp&nbsp PRICE &nbsp&nbsp</th>";
                echo "<th>&nbsp&nbsp STOCK &nbsp&nbsp</th>";
                echo "<th>&nbsp&nbsp ADD TO CART &nbsp&nbsp</th>";
            echo "</tr>";

            if($sql['stock']>0)
            {
              echo "<tr>";
              echo "<td>&nbsp&nbsp<div class='zoom'>" . "<img src='".$sql['image']."'alt='IMAGE' width=100 height=100>" . "</div></td>";
                echo "<td>&nbsp&nbsp" . $sql['pid'] . "</td>";
                echo "<td>&nbsp&nbsp" . $sql['p_name'] . "</td>";
                echo "<td>&nbsp&nbsp" . $sql['category'] . "</td>";
                echo "<td>&nbsp&nbsp" . $sql['sid'] . "</td>";
                echo "<td>&nbsp&nbsp" . $sql['price'] . "</td>";
                echo "<td>&nbsp&nbsp" . $sql['stock'] . "</td>";
               // session_start();
               // $_SESSION['sql']=$sql;
               // session_destroy();
               echo "<td><form action='cart_add.php' method='POST'><button class = 'btn btn-success' type = 'submit' value='".$sql['pid']."' name= 'SUBMIT' ><i class='fas fa-shopping-cart'>" . '&nbspADD TO CART' . "</i></button></form></td>";

            echo "</tr>";  
            }
            
  			$i=1;
            while($sql = $result->fetch_assoc())
            {
            
            if($sql['stock']>0)
            {
              echo "<tr>";
              echo "<td>&nbsp&nbsp<div class='zoom'>" . "<img src='".$sql['image']."'alt='IMAGE' width=100 height=100>" . "</div></td>";
                echo "<td>&nbsp&nbsp" . $sql['pid'] . "</td>";
                echo "<td>&nbsp&nbsp" . $sql['p_name'] . "</td>";
                echo "<td>&nbsp&nbsp" . $sql['category'] . "</td>";
                echo "<td>&nbsp&nbsp" . $sql['sid'] . "</td>";
                echo "<td>&nbsp&nbsp" . $sql['price'] . "</td>";
                echo "<td>&nbsp&nbsp" . $sql['stock'] . "</td>";
               // session_start();
               // $_SESSION['sql']=$sql;
               // session_destroy();
                echo "<td><form action='cart_add.php' method='POST'><button class = 'btn btn-success' type = 'submit' value='".$sql['pid']."' name= 'SUBMIT' ><i class='fas fa-shopping-cart'>" . '&nbspADD TO CART' . "</i></button></form></td>";

            echo "</tr>";  
            }$i+=1;
        	}
        echo "</table>";
	}

else
	{
		echo 'NO SUCH PRODUCTS !!! ';
	}
?>

<div class="footer" align="center">

       <a href="#"><i class="fas fa-facebook-official"></i></a>
       <a href="https://in.pinterest.com/"><i class="fas fa-pinterest-p"></i></a>
       <a href="#"><i class="fas fa-twitter"></i></a>
       <a href="https://www.instagram.com"><i class="fas fa-instagram"></i></a>
       <a href="https://www.youtube.com/"><i class="fas fa-youtube"></i></a>
        <p align="center">COPYRIGHT 2020 by MCOE</p> 
</div>


</body>
</html>
