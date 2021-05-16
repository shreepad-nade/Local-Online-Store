<!DOCTYPE html>
<html>
<head>
    <title>Cart </title>
     
      <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />

      <link rel="stylesheet" type="text/css" href="HOMEPAGE.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


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

        .footer
        {
            background-color: #181818;
            width:100%;
            padding:10px;
            color: white;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            color: #588c7e;
            font-family: monospace;
            font-size: 25px;
            text-align: left;
            }
        th {
        background-color: #588c7e;
        color: white;
        }
        tr:nth-child(odd) {background-color: #f2f2f2}

    </style>
</head>
<body>




    <?php
    require 'b_header.php';
    require 'b_db_key.php';
    $conn = connect_db();
    session_start();

    $email=$_SESSION['email'];
    $sql = "SELECT * FROM buyer where email='$email'"; 
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $u_id = $row["uid"];

    $sql = "SELECT * FROM cart where uid='$u_id'";
    $result = $conn->query($sql);
    $sql = $result->fetch_assoc();
    $p_id = $sql["pid"];
    if($sql)
    {

        $sl = "SELECT * FROM products where pid='$p_id'";
        $res = $conn->query($sl);
        $sl = $res->fetch_assoc();

        echo "<table>";
            echo "<tr>";
                echo "<th>&nbsp&nbsp&nbsp CART ID </th>";
                echo "<th>&nbsp&nbsp&nbspUSER ID </th>";
                echo "<th>&nbsp&nbsp&nbsp SELLER ID </th>";
                echo "<th>&nbsp&nbsp&nbsp PRODUCT ID </th>";
                echo "<th>&nbsp&nbsp&nbsp PRICE  </th>";
                echo "<th>&nbsp&nbsp&nbsp PRODUCT NAME </th>";
                echo "<th>&nbsp&nbsp&nbspQUANTITY</th>";
            echo "</tr>";
                  if ($sql['stat']==0) {
                      # code...
                  
            echo "<tr>";
                echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp" . $sql['cart_id'] . "</td>";
                echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp" . $sql['uid'] . "</td>";
                echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp" . $sql['sid'] . "</td>";
                echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp" . $sql['pid'] . "</td>";
                echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp" . $sl['price'] . "</td>";
                echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp" . $sl['p_name'] . "</td>";
                echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp" . $sql['qty' ]. "</td>";
            echo "</tr>";
               }
        while($sql = $result->fetch_assoc())
        {
             $sl = "SELECT * FROM products where pid='$p_id'";
             $res = $conn->query($sl);
             $sl = $res->fetch_assoc();
              if ($sql['stat']==0) {
                  # code...
              
            echo "<tr>";
                echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp" . $sql['cart_id'] . "</td>";
                echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp" . $sql['uid'] . "</td>";
                echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp" . $sql['sid'] . "</td>";
                echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp" . $sql['pid'] . "</td>";
                echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp" . $sl['price'] . "</td>";
                echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp" . $sl['p_name'] . "</td>";
                echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp" . $sql['qty' ]. "</td>";
            echo "</tr>";
            }
        }
        echo "<table>";
        

    }
    else
    {
        echo"YOUR CART IS EMPTY";
    }
?>
    <form action="cart_backend.php" method="POST">
       <center> <button class="btn-outline-info" type="submit" value="submit" name="place_order"><i class="fas fa-check">&nbsp;Place Order</i></button></center>
    </form>
     <div id="Alter">

        <div class="left-box" align="left">
       <form action = 'cart_backend.php' method = 'POST'>
        <h1>Update Product :</h1>
        <div class = "container">
            <div class="form-group">
            <label>Product Id:</label>
            <input class = 'form-control w-100' type="Number" name="pid" required>
            </div>
            <div>
            <label>Quantity:</label>
            <input class = 'form-control w-100' style="width: 10%;" type="Number" name="quantity" required>
            </div>

            <div class ='text-center mt-3 w-50'>
                <left><button class = 'btn btn-outline-info' type = 'update' value = 'update' name= 'update' style="width: 30%">Update</button></left>
            </div>
            </div>
        </form>
        </div>

        <div class="right-box">
               <form action = 'cart_backend.php' method = 'POST'>

            <h4> Delete Your Product</h4>
        <div class = "container">
            <div class="form-group">
            <label>Product Id:</label>
            <input class = 'form-control w-50' type="Number" name="pid" size="14" required >
            <div class ='text-center mt-3 w-50'>
               <left> <button class = 'btn btn-outline-info' type = 'delete' value = 'delete' name= 'delete' style="width: 100%; height: 20%"><i class="fas fa-trash">&nbsp;Delete</i></button></left>
            </div>
            </div>
        </div>
          </form>
       </div>
     </div>
     <br>
  

     <form action="HOMEPAGE.php">
     <button class="btn btn-inline-info" type="submit" name="home" style="width: 100% height:20%" ><i class="fas fa-home">&nbsp;Back To Home</i></button>
     </form>

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