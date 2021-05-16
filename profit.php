<?php
require 's_db_key.php';
session_start();
$email=$_SESSION['email'] ;
$sql = "SELECT * FROM seller where email='$email'"; 
$conn = connect_db();
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$name = $row["name"];

require 's_header.php'
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
            padding: 5px;
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
           padding: 5px 10px;
           margin: 8px 0;
           border:none;
           cursor: pointer;
           width:25%;
         }

     input[type=text],input[type=password],input[type=email],input[type=Number]
        {
            width: 25%;
            padding: 5px 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: left-box;

        }
    form 
        {

            width: 300;
            height:150;

            border: 6px solid #f1f1f1;
        }
        .leftbox 
        {
            position: absolute;
            top: 60;
            left:30;
            
            box-sizing: border-box;
            padding: 20px;
            width: 25%;
            height: 400px;
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
        tr:ntxxxxxxxxx`h-child(odd) {background-color: #f2f2f2}

</style>
</head>
<body>
    <hr><center><h1><b>Date-wise Profit</b></h1></center><hr>
    
    <div class="left-box" align="left">
       <center>
       	<form action = '<?php echo $_SERVER['PHP_SELF']; ?>' method = 'POST'>
        
        <div class = "container">
            <div class="form-group">
            <label> <h2>Enter Date :</h2> </label>
            <input class = 'form-control w-50' type="date" name="dat" placeholder="DD-MM-YYY" required>
            
            </div>
            <div class ='text-center mt-3 w-50'>
                <button class = 'btn btn-outline-info' type = 'date' value = 'dat' name= 'date'>submit 
                </button>
            </div>
        </form>
       </center>
        </div>
    
<?php
 if($_POST)

	{
		$date=$_POST['dat'];


	$conn = connect_db();
	$sql = "SELECT * FROM seller where email='$email'"; 
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$sid = $row["sid"];
	
	$sql = "SELECT * FROM cart where sid='$sid' and orderdate='$date' and stat>='1'";
	$result = $conn->query($sql);
	$sql = $result->fetch_assoc();

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
                echo "</tr>";
                if($sql['stat']>=1 )
                {
           			 echo "<tr>";
            		$total=$total+(($sql['qty'])*($sl['price']));
                	echo "<td> &nbsp &nbsp<div class='zoom'>" . "<img src='".$sl['image']."'alt='IMAGE' width=100 height=100>" . "</div></td>";
               
		            echo "<td> &nbsp &nbsp"   . $sql['pid'] .   "</td>";
		            echo "<td> &nbsp &nbsp"   . $sl['price'] .   "</td>";
		            echo "<td> &nbsp &nbsp"   . $sql['qty'].   "</td>";
		           	echo "<td> &nbsp &nbsp"   . $sl['p_name'] .   "</td>";
		            echo "<td> &nbsp &nbsp"   . $sql['orderdate'] .   "</td>";
		            echo "</tr>";
                }

                while($sql = $result->fetch_assoc())
        {   
            $p_id = $sql["pid"];
                 $sl = "SELECT * FROM products where pid='$p_id'";
            $res = $conn->query($sl);
            $sl = $res->fetch_assoc();

              if($sql['stat']>=1 )
                {
           			 echo "<tr>";
            		$total=$total+(($sql['qty'])*($sl['price']));
                	echo "<td> &nbsp &nbsp<div class='zoom'>" . "<img src='".$sl['image']."'alt='IMAGE' width=100 height=100>" . "</div></td>";
               
		            echo "<td> &nbsp &nbsp"   . $sql['pid'] .   "</td>";
		            echo "<td> &nbsp &nbsp"   . $sl['price'] .   "</td>";
		            echo "<td> &nbsp &nbsp"   . $sql['qty'].   "</td>";
		           	echo "<td> &nbsp &nbsp"   . $sl['p_name'] .   "</td>";
		            echo "<td> &nbsp &nbsp"   . $sql['orderdate'] .   "</td>";
		            echo "</tr>";
                }
            
        }
        echo "<table>";
         echo "<table>";
            echo "<tr>";
                            echo "<th>  &nbsp &nbsp TOTAL  PROFIT FOR THE DAY: &nbsp &nbsp" . $total . " </th>";
            echo "</tr>";


            
           echo "</tr>";
          echo "<table>";
    }
    else 
    {
        echo "No Products sold on $date";
    }

    }    

?>
  </body>
</html>  