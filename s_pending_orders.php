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

   
    <link rel="stylesheet" href="HOMEPAGE.css">

      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' >


   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

     <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />


    <style >
        
     table {
            border-collapse: collapse;
            width: 100%;
            color: #588c7e;
            font-family: monospace;
            font-size: 15px;
            text-align: center;
            }
        th {
        background-color: #588c7e;
        color: white;
        }
        tr:nth-child(odd) {background-color: #f2f2f2}

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
       <li ><a href="sign_in_as.php" class="btn-inline-info"><i class="fa fa-sign-out" style="color:black;"><h4>LOGOUT</h4></i></a></li>
     <li><a><i class="fas fa-user"style="color:black;"><h4><?php  echo $name ?></h4></i></a></li>
    </ul>
  </div>
</nav>

 <hr><center><h1><b>PENDING ORDERS</b></h1></center><hr>

</body>

</html>

<?php 

//require 's_db_key.php';
$conn = connect_db();

//session_start();
$email=$_SESSION['email'];

$sql = "SELECT * FROM seller where email='$email'"; 
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$sid = $row["sid"];


$sql = "SELECT * FROM cart where sid='$sid' and (stat='1' or stat='2')";
$result = $conn->query($sql);
if($result)

{
    $sql = $result->fetch_assoc();
    if($sql)
    {
        $p_id=$sql['pid'];
    $u_id=$sql['uid'];
       
    }
    
}
if($sql)
{

    $sl = "SELECT * FROM products where pid='$p_id'";
        $res = $conn->query($sl);
        $sl = $res->fetch_assoc();

    $s= "SELECT * from buyer where uid='$u_id'";
    $r = $conn->query($s);
    $s = $r->fetch_assoc();        

  echo "<table>";
            echo "<tr>";
               echo "<th>&nbsp &nbsp &nbsp &nbsp</th>";

                //echo "<th>&nbsp &nbsp PRODUCT ID &nbsp &nbsp</th>";
                echo "<th><center>&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp PRODUCT NAME &nbsp &nbsp</center></th>";
                //echo "<th>&nbsp &nbsp CATEGORY &nbsp &nbsp</th>";
                echo "<th><center>&nbsp &nbsp BUYER NAME &nbsp &nbsp</center></th>";
                echo "<th><center>&nbsp &nbsp BUYER ADDRESS<center></th>";
                echo "<th>&nbsp &nbsp QUANTITY</th>";
                echo "<th>&nbsp &nbsp PRICE</th>";
                echo "<th>&nbsp &nbsp TOTAL</th>";
                echo "<th>&nbsp &nbsp DATE</th>";

                echo "<th>&nbsp &nbsp CHANGE STATUS &nbsp &nbsp</th>";


            echo "</tr>";

            echo "<tr>";
                echo "<td>&nbsp&nbsp" . "<img src='".$sl['image']."'alt='IMAGE' width=100 height=100>" . "</td>";

               // echo "<td>&nbsp &nbsp" . $sql['pid'] . "</td>";
                echo "<td>&nbsp &nbsp" . $sl['p_name'] . "</td>";
                //echo "<td>&nbsp &nbsp" . $sl['category'] . "</td>";
                echo "<td>&nbsp &nbsp" . $s['name'] . "</td>";
                echo "<td>&nbsp &nbsp" . $s['address'] . "</td>";
                echo "<td>&nbsp &nbsp" . $sql['qty'] . "</td>";
                echo "<td>&nbsp &nbsp" . $sl['price'] . "</td>";
                
                $total=($sl['price'])*($sql['qty']);
                
                echo "<td>&nbsp &nbsp" . $total . "</td>";
                echo "<td>&nbsp &nbsp" . $sql['orderdate'] . "</td>";
                $str1=strval($sql['uid']);
                $str2=strval($sql['pid']);

                $str3=$str1.".".$str2;
                
                if($sql['stat']==1)
                {

                 echo "<td><form action='cart_backend.php' method='POST'><button class = 'btn btn-outline-info' type = 'submit' value='".$str3."' name= 'Dispatch' >" . 'Dispatch' . "</button></form></td>";

                }

               else  if($sql['stat']==2)
                {
                    echo "<td><form action='cart_backend.php' method='POST'><button class = 'btn btn-outline-info' type = 'submit' value='".$str3."' name= 'Completed' >" . 'Delivered' . "</button></form></td>";
                }
            echo "</tr>";


while($sql = $result->fetch_assoc()){
    $p_id=$sql['pid'];
    $u_id=$sql['uid'];

         $sl = "SELECT * FROM products where pid='$p_id'";
        $res = $conn->query($sl);
        $sl = $res->fetch_assoc();

    $s= "SELECT * from buyer where uid='$u_id'";
    $r = $conn->query($s);
    $s = $r->fetch_assoc();  

    echo "<tr>";
                echo "<td>&nbsp&nbsp" . "<img src='".$sl['image']."'alt='IMAGE' width=100 height=100>" . "</td>";

                //echo "<td>&nbsp &nbsp" . $sql['pid'] . "</td>";
                echo "<td>&nbsp &nbsp" . $sl['p_name'] . "</td>";
                //echo "<td>&nbsp &nbsp" . $sl['category'] . "</td>";
                echo "<td>&nbsp &nbsp" . $s['name'] . "</td>";
                echo "<td>&nbsp &nbsp" . $s['address'] . "</td>";
                echo "<td>&nbsp &nbsp" . $sql['qty'] . "</td>";
                echo "<td>&nbsp &nbsp" . $sl['price'] . "</td>";
                
                $total=($sl['price'])*($sql['qty']);
                
                echo "<td>&nbsp &nbsp" . $total . "</td>";
                echo "<td>&nbsp &nbsp" . $sql['orderdate'] . "</td>";
                
                $str1=strval($sql['uid']);
                $str2=strval($sql['pid']);

                $str3=$str1.".".$str2;
                

                 if($sql['stat']==1)
                {
                    echo "<td><form action='cart_backend.php' method='POST'><button class = 'btn btn-outline-info' type = 'submit' value='".$str3."' name= 'Dispatch' >" . 'Dispatch' . "</button></form></td>";

                }

               else  if($sql['stat']==2)
                {
                    echo "<td><form action='cart_backend.php' method='POST'><button class = 'btn btn-outline-info' type = 'submit' value='".$str3."' name= 'Completed' >" . 'Delivered' . "</button></form></td>";
                }
            echo "</tr>";    
        }
        echo "</table>";
}

else{
        echo "<h3>You Have No Pending Orders!!</h3>";
}
?>