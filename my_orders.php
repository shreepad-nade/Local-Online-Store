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
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="HOMEPAGE.css">
  
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="HOMEPAGE.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

   
	<title>Your Orders</title>
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




	<center>
<hr><h1><b>Your Placed Orders</b></h1><hr>
</center>

<?php
	
	
	
	$conn = connect_db();

	

	$email=$_SESSION['email'] ;
	$sql = "SELECT * FROM buyer where email='$email'"; 
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$u_id = $row["uid"];

		
    $email=$_SESSION['email'];
    $sql = "SELECT * FROM buyer where email='$email'"; 
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $u_id = $row["uid"];


    $sql = "SELECT * FROM cart where uid='$u_id' Order by stat asc";
    $result = $conn->query($sql);
    
    $sql = $result->fetch_assoc();
    if($sql)
    {
    $p_id = $sql["pid"];
	}


	    

	    if($sql)
	    {
	       
	        

	        $sl = "SELECT * FROM products where pid='$p_id'";
        $res = $conn->query($sl);
        $sl = $res->fetch_assoc();


	        echo "<table>";
	            echo "<tr>";
	            	echo "<th>  &nbsp&nbsp  &nbsp&nbsp  </th>";
	                //echo "<th>  &nbsp&nbsp cart_id &nbsp&nbsp  </th>";
	                //echo "<th> &nbsp&nbsp USER ID &nbsp&nbsp </th>";
	                //echo "<th> &nbsp&nbsp SELLER ID &nbsp&nbsp </th>";
	                echo "<th> &nbsp&nbsp PRODUCT ID &nbsp&nbsp </th>";
	                echo "<th> &nbsp&nbsp PRICE &nbsp&nbsp </th>";
	                echo "<th>  &nbsp&nbsp QUANTITY &nbsp&nbsp </th>";
	                echo "<th> &nbsp&nbsp PRODUCT NAME &nbsp&nbsp</th>";
	                echo "<th> &nbsp&nbsp ORDER DATE &nbsp&nbsp</th>";
                  echo "<th> &nbsp&nbsp STATUS &nbsp&nbsp</th>";
	            echo "</tr>";
	                if($sql['stat']>=1)
	                {
	            echo "<tr>";
	            	echo "<td>" . "<img src='".$sl['image']."'alt='IMAGE' width=100 height=100>" . "</td>";
	               // echo "<td>&nbsp&nbsp"   . $sql['cart_id'] .   "</td>";
	                //echo "<td>&nbsp&nbsp"   . $sql['uid'] .   "</td>";
	                //echo "<td>&nbsp&nbsp"   . $sql['sid'] .   "</td>";
	                
                  echo "<td>&nbsp&nbsp"   . $sql['pid'] .   "</td>";
	                echo "<td>&nbsp&nbsp"   . $sl['price'] .   "</td>";
	                echo "<td>&nbsp&nbsp"   . $sql['qty'].   "</td>";
	               echo "<td>&nbsp&nbsp"   . $sl['p_name'] .   "</td>";
                  echo "<td>&nbsp&nbsp"   . $sql['orderdate'].   "</td>";
	               if($sql['stat']==1)
	                {
	                	echo "<td>&nbsp&nbsp Order Placed </td>";
	                }
	                else if($sql['stat']==2)
	                {
	                	echo "<td>&nbsp&nbsp Order Dispatched </td>";
	                }
	                else
	                {
	                	echo "<td>&nbsp&nbsp Order Delivered </td>";
	                }
	            echo "</tr>";
	                }

	        while($sql = $result->fetch_assoc())
	        {   
	                $p_id = $sql["pid"];
	       			 $sl = "SELECT * FROM products where pid='$p_id'";
			        $res = $conn->query($sl);
			        $sl = $res->fetch_assoc();



	                if($sql['stat']>=1)   
	                {    
	             echo "<tr>";
	             	echo "<td>" . "<img src='".$sl['image']."'alt='IMAGE' width=100 height=100>" . "</td>";
                 // echo "<td>&nbsp&nbsp"   . $sql['cart_id'] .   "</td>";
                  //echo "<td>&nbsp&nbsp"   . $sql['uid'] .   "</td>";
                  //echo "<td>&nbsp&nbsp"   . $sql['sid'] .   "</td>";
                  
                  echo "<td>&nbsp&nbsp"   . $sql['pid'] .   "</td>";
                  echo "<td>&nbsp&nbsp"   . $sl['price'] .   "</td>";
                  echo "<td>&nbsp&nbsp"   . $sql['qty'].   "</td>";
                 echo "<td>&nbsp&nbsp"   . $sl['p_name'] .   "</td>";
                  echo "<td>&nbsp&nbsp"   . $sql['orderdate'].   "</td>";
	                if($sql['stat']==1)
	                {
	                	echo "<td>&nbsp&nbsp Order Placed </td>";
	                }
	                else if($sql['stat']==2)
	                {
	                	echo "<td>&nbsp&nbsp Order Dispatched </td>";
	                }
	               	else if($sql['stat']==3)

	                {
	                	echo "<td>&nbsp&nbsp Order Delivered </td>";
	                }
	            echo "</tr>";
	            }


	            
	        }
	        echo "<table>";
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