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

  <title>MY CART</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="HOMEPAGE.css">

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
     
     <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
    #Alter{
    position: relative;
    margin: 5% auto;
    height: 500px;
    width: 100%;
    background: white;
    
}
    .container
        {
            padding: 16px;
            background-color: white;

        }
    button:hover
    {
        opacity: 0.8;
    }

    button
        {
           background-color: #4CAF50;
           color: white;
           padding: 14px 20px;
           margin: 8px 0;
           border:none;
           cursor: pointer;
           width:100%;
         }

     input[type=text],input[type=password],input[type=email],input[type=Number]
        {
            width: 25%;
            padding: 10px 18px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: left-box;

        }
    form 
        {
            width: 300;
            height:400;

                   }
        .leftbox 
        {
            position: left;
            top: 60;
            left:30;
            
            box-sizing: border-box;
            padding: 40px;
            width: 30%;
            height: 400px;
        }
        .right-box 
        {
        position: absolute;
        top: -40;
        right: +250;
        box-sizing: border-box;
        padding: 40px;
        width: 25%;
        height: 400px;
        
        }
      
      table {
            border-collapse: collapse;
            width: 100%;
            color: #588c7e;
            font-family: monospace;
            font-size: 14px;
            text-align: center;
            }
        th {
        background-color: #588c7e;
        color: white;
        }
        tr:nth-child(odd) {background-color: #f2f2f2}



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


</style>
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
</head>
<?php echo '<hr><center><h1><b>MY CART</b></h1></center><hr>'.'';?>
<?php
    require 'b_header.php';

    $conn = connect_db();
    //session_start();

    $email=$_SESSION['email'];
    $sql = "SELECT * FROM buyer where email='$email'"; 
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $u_id = $row["uid"];


    $sql = "SELECT * FROM cart where uid='$u_id'";
    $result = $conn->query($sql);
    $sql = $result->fetch_assoc();
    
  //echo $p_id;

    
    if($sql)
    {
       $p_id = $sql["pid"];
        $sl = "SELECT * FROM products where pid='$p_id'";
        $res = $conn->query($sl);
        $sl = $res->fetch_assoc();
        $total=0;
        echo "<table>";
            echo "<tr>";
                echo "<th>    </th>";
               
                echo "<th>  &nbsp &nbsp PRODUCT ID  &nbsp &nbsp  </th>";
                echo "<th>   &nbsp &nbsp PRICE  &nbsp &nbsp </th>";
                echo "<th>   &nbsp &nbsp QUANTITY  &nbsp &nbsp  </th>";
                echo "<th> &nbsp &nbsp PRODUCT NAME &nbsp &nbsp</th>";
                echo "<th> &nbsp &nbsp ORDER DATE &nbsp &nbsp</th>";
                echo "<th> &nbsp &nbsp ORDER DELETE &nbsp &nbsp</th>";
            echo "</tr>";
                if($sql['stat']==0 )
                {
            echo "<tr>";
            $total=$total+(($sql['qty'])*($sl['price']));
                echo "<td> &nbsp &nbsp<div class='zoom'>" . "<img src='".$sl['image']."'alt='IMAGE' width=100 height=100>" . "</div></td>";
               
                echo "<td> &nbsp &nbsp"   . $sql['pid'] .   "</td>";
                echo "<td> &nbsp &nbsp"   . $sl['price'] .   "</td>";
                echo "<td> &nbsp &nbsp"   . $sql['qty'].   "</td>";
               echo "<td> &nbsp &nbsp"   . $sl['p_name'] .   "</td>";
               echo "<td> &nbsp &nbsp"   . $sql['orderdate'] .   "</td>";
                                echo "<td><form action='cart_backend.php' method='POST'><button class = 'btn btn-danger' type = 'submit' value='".$sql['pid']."' name= 'SUBMIT' ><i class='fas fa-trash-alt'>" . '&nbsp&nbspDelete' . "</i></button></form></td>";
               

            echo "</tr>";
                }

        while($sql = $result->fetch_assoc())
        {   
            $p_id = $sql["pid"];
                 $sl = "SELECT * FROM products where pid='$p_id'";
            $res = $conn->query($sl);
            $sl = $res->fetch_assoc();

                if($sql['stat']==0)   
                {    
                              $total=$total+(($sql['qty'])*($sl['price']));

             echo "<tr>";
                echo "<td>&nbsp &nbsp<div class='zoom'>" . "<img src='".$sl['image']."'alt='IMAGE' width=100 height=100>" . "</div></td>";
                
                echo "<td>&nbsp &nbsp"   . $sql['pid'] .   "</td>";
                echo "<td>&nbsp &nbsp"   . $sl['price'] .   "</td>";
                echo "<td>&nbsp &nbsp"   . $sql['qty'].   "</td>";
                echo "<td>&nbsp &nbsp"   . $sl['p_name'] .   "</td>";
                echo "<td>&nbsp &nbsp"   . $sql['orderdate'] .   "</td>";
                echo "<td><form action='cart_backend.php' method='POST'><button class = 'btn btn-danger' type = 'submit' value='".$sql['pid']."' name= 'SUBMIT' ><i class='fas fa-trash-alt'>" . '&nbsp&nbspDelete' . "</i></button></form></td>";
            echo "</tr>";
            }


            
        }
        echo "<table>";
         echo "<table>";
            echo "<tr>";
                            echo "<th>  &nbsp &nbsp TOTAL: &nbsp &nbsp" . $total . " </th>";
            echo "</tr>";


            
           echo "</tr>";
          echo "<table>";
    }

   

?>
<body>

<form action= 'cart_backend.php' method= 'POST'>
<button class = 'btn btn-success' type = "submit" value = 'submit' name= 'place_order' ><i class="fas fa-check"><b>&nbsp;Place Order</b></i></button>
</form>

<div id="Alter">
    <left>
    <div class="leftbox" align="left">
       <form action = 'cart_backend.php' method = 'POST'>
        <h1>Update Product from Cart</h1>
        <div class = "container">
            <div class="form-group">
            <label>Product Id:</label>
            <input class = 'form-control-left  w-25' type="text" name="pid" required>
            <div>
            <label>Quantity:</label>
            <input class = 'form-control-left  w-25' type="Number" name="quantity" required>
            </div>
            <div>

            <div class ='text-left mt-3 w-25'>
                <button class = 'btn btn-outline-info' type = 'update' value = 'update' name= 'update'>Update</button>
            </div>
            </div>
        </form>
        </div>
        </div>


</body>
</html>