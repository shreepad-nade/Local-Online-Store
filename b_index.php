<?php
require 'b_header.php';
require 'b_db_key.php';
?>

<head>
    <meta name="viewport" content="width=device-width,intial-scale=1">
  <link rel="stylesheet" href="/w3css/3/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-image: url("Homemade.jpg");
}
* {
  box-sizing: border-box;
}


.container {
  position: relative;
  margin-top: 15px;
  padding: 50px;
  background-color: grey;
  opacity: 0.95;
}
.btn-outline-info {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 25%;
  opacity: 0.9;
}

.btn-outline-info:hover {
  opacity: 1;
}
input[type=text], input[type=password],input[type=email]

{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
.footer-box {
  background-color: #f1f1f1;
  text-align: center;
}
.footer
    {
      background-color: black;
      width:100%;
      padding:30px;
      color: white;
    }
@media screen and (max-width: 300px)
    {
      span.psw
      {
        display: block;
        float: none;
      }
      
    }   
</style>
</head>

<body>
  
<div class = 'container'>
<div>
<hr><center><div><h1><a style="color: white;">LOGIN AS BUYER</a></h1></div></center><hr>
<hr>
</div>
<?php
  session_start();
  if(isset($_SESSION['suc']))
  {
    echo "<p style='color:green;'>".$_SESSION['suc']."</p>";
    session_destroy();
  }
?>
<form method = 'POST' action = 'b_backend.php' >
<div class="form-group">
  <div>
<b><label>Email <a style="color:red;">*</a>: </label></b>
<input class = 'form-control w-50' type="email" name="email" id="email" required placeholder="Enter email here">
  </div>
  <div>
<b><label>Password<a style="color:red;">*</a>:</label></b>
<input class= 'form-control w-25' type="password" name="password" id="password" autocomplete="off" placeholder="Enter Password here">
  </div>
  <hr>
</div>
<center><button class = 'btn-outline-info' type="submit" name="login" value= 'login' class="submit">Login</button></center>
</form>
<?php
  if(isset($_SESSION['er']))
  {
    echo "<p style='color:red;'>".$_SESSION['er']."</p>";
    session_destroy();
  }
?>
<div class="container footer-box" >
<p>Not a member? <a href="b_register.php" class="sign-up">Sign up now</a></p>
</div>
</div>
 <div class="footer" align="center">
    <p>Powered by</p>
       <a href="#"><i class="fa fa-facebook-official"></i></a>
       <a href="#"><i class="fa fa-pinterest-p"></i></a>
       <a href="#"><i class="fa fa-twitter"></i></a>
       <a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a>
       <a href="https://www.youtube.com/"><i class="fa fa-youtube"></i></a>
  
 </div>
</body>
</html>