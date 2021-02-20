<?php
require 's_db_key.php';
session_start();
$email=$_SESSION['email'] ;
$sql = "SELECT * FROM seller where email='$email'"; 
$conn = connect_db();
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$name = $row["name"];
?>

<html>
<title>MY Products</title>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
-

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="HOMEPAGE.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
           width:25%;
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
            width: 500;
            height:400;

            border: 6px solid #f1f1f1;
        }
        .leftbox 
        {
            position: absolute;
            top: 60;
            left:30;
            
            box-sizing: border-box;
            padding: 40px;
            width: 25%;
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
        height: 25%;
        background-size: cover;
        background-position: center;
        }

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

</style>
</head>
<body>
    <hr><center><h1><b>MY PRODUCTS</b></h1></center><hr>

<?php 

//require 's_db_key.php';
$conn = connect_db();


$sql = "SELECT * FROM seller where email='$email'"; 
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$sid = $row["sid"];

// echo $sid;

$sql = "SELECT * FROM products where sid='$sid'";
$result = $conn->query($sql);
$sql = $result->fetch_assoc();
if($sql)
{
    $pid = $sql['pid'];
    $sl = "CALL sells_count($pid)";
    $sl = $conn->query($sl);
    $sl1 = $sl->fetch_assoc();
    //echo $sl['sum(qty)'];
  echo "<table>";
            echo "<tr>";
                echo "<th></th>";
                echo "<th> &nbsp&nbsp&nbsp PRODUCT ID  &nbsp&nbsp</th>";
                echo "<th> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp PRODUCT NAME  &nbsp&nbsp</th>";
                echo "<th> &nbsp&nbsp&nbsp CATEGORY  &nbsp&nbsp</th>";
                echo "<th> &nbsp&nbsp&nbsp SELLER ID  &nbsp&nbsp</th>";
                echo "<th>  &nbsp&nbsp&nbsp&nbsp PRICE  &nbsp&nbsp</th>";
                echo "<th>  &nbsp&nbsp&nbsp STOCK  &nbsp&nbsp</th>";
                echo "<th>  &nbsp&nbsp&nbsp SALES  &nbsp&nbsp</th>";
            echo "</tr>";


            echo "<tr>";
                echo "<td>" . "<img src='".$sql['image']."'alt='IMAGE' width=100 height=100>" . "</td>";
                echo "<td> &nbsp &nbsp" . $sql['pid'] . "</td>";
                echo "<td> &nbsp &nbsp" . $sql['p_name'] . "</td>";
                echo "<td> &nbsp &nbsp" . $sql['category'] . "</td>";
                echo "<td> &nbsp &nbsp" . $sql['sid'] . "</td>";
                echo "<td> &nbsp &nbsp" . $sql['price'] . "</td>";
                echo "<td> &nbsp &nbsp" . $sql['stock'] . "</td>";
                if(is_null($sl1['sum(qty)']))
                {
                    echo "<td> &nbsp &nbsp" . "0" . "</td>";
                }
                else
                {
                    echo "<td> &nbsp &nbsp" . $sl1['sum(qty)']. "</td>";
                }
            echo "</tr>";




while($row = $result->fetch_assoc())
{
            $con=new mysqli($sql_host,$sql_username,$sql_password);
            $con -> select_db($sql_database);

            $pid = $row['pid'];
            $sl = "CALL sells_count($pid)";
            $sl = $con->query($sl);
            echo mysqli_error($con);
        
            $sl1 = $sl->fetch_assoc();
            echo "<tr>";
                echo "<td> &nbsp &nbsp" . "<img src='".$row['image']."'alt='IMAGE' width=100 height=100>" . "</td>";
                echo "<td> &nbsp &nbsp" . $row['pid'] . "</td>";
                echo "<td> &nbsp &nbsp" . $row['p_name'] . "</td>";
                echo "<td> &nbsp &nbsp" . $row['category'] . "</td>";
                echo "<td> &nbsp &nbsp" . $row['sid'] . "</td>";
                echo "<td> &nbsp &nbsp" . $row['price'] . "</td>";
                echo "<td> &nbsp &nbsp" . $row['stock'] . "</td>";
                if(is_null($sl1['sum(qty)']))
                {
                    echo "<td> &nbsp &nbsp" . "0" . "</td>";
                }
                else
                {
                    echo "<td> &nbsp &nbsp" . $sl1['sum(qty)']. "</td>";
                }
                
            echo "</tr>";
        }
        echo "</table>";

}

else{
        echo "You have no products registered!!!!";
}
?>

<div id="Alter">
    
    <div class="left-box" align="left">
       <form action = 'p_backend.php' method = 'POST'>
        <h1>Update Product details</h1>
        <div class = "container">
            <div class="form-group">
            <label>Product Id:</label>
            <input class = 'form-control w-100' type="text" name="pid" required>
            <div>
            <label>New Stock count:</label>
            <input class = 'form-control w-100' type="Number" name="quantity" required>
            </div>
            <div>
            <label>New price:</label>
            <input class = 'form-control w-100' type="Number" name="price" required>
            </div>
            
            <div class ='text-center mt-3 w-50'>
                <left><button class = 'btn btn-outline-info' type = 'update' value = 'update' name= 'update'>Update</button></left>
            </div>
            </div>
        </form>
        </div>
    

        
        <div class="right-box">
               <form action = 'p_backend.php' method = 'POST'>

            <h1> Delete your product</h1>
        <div class = "container">
            <div class="form-group">
            <label>Product Id:</label>
            <input class = 'form-control w-50' type="text" name="pid" required>
            <div class ='text-center mt-3 w-50'>
                <button class = 'btn btn-outline-info' type = 'delete' value = 'delete' name= 'delete'>Delete</button>
            </div>
            </div>
        </div>
    </div>
    </form>
    </div>
</body>
</html>