<?php
require 's_header.php';
?>
<head>
	<script type="text/javascript">
    
    function validate_form()
    {
        var y = document.forms["myform"]["password"].value;
        var z = document.forms["myform"]["repassword"].value;

        if(y!=z)
        {
          alert("Passwords must match");
                return false;
        }

        return true;
    }

  </script>
	<style >
		body 
		{ 
		   
           font-family:calibri, Helvetica, sanserif;
           background-image: url("Homemade.jpg");
		}
		* {
			  box-sizing: border-box;
			}

		form 
		{
			width: 100;
			height:100;

			border: 6px solid #f1f1f1;
		}

		input[type=text],input[type=password],input[type=email],input[type=Number]
		{
			width: 100%;
			padding: 10px 18px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;

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

		button:hover
		{
			opacity: 0.8;
		}

         .avatar
         {
         	vertical-align: middle;
         	width: 50px;
         	border-radius: 50%;
         }
		.cancelbtn
		{
          width: auto;
          padding: 10px 18px;
          background-color: #f44336;
		}

		.imgcontainer
		{
			text-align: center;
			margin: 24px 0 12px 0;
		}

		

		.container
		{
			padding: 16px;
      color: white;
      position: relative;
margin-top: 15px;
background-color: grey;
  opacity: 0.95;

		}
</style>

</head>
<body>
<div class = "container">
<div>
<hr><center><h2><b>REGISTER AS SELLER</b></h2></center><hr>
</div>
<form action = 's_backend.php' method = 'POST' name='myform' onsubmit='return validate_form();'>
<div class = "container">
<div class="form-group">
	<div>
<label>Name<a style="color:red;">*</a>:</label>
<input class = 'form-control w-50' type="text" name="name" required>
</div>
<div>
<label>Email<a style="color:red;">*</a>:</label>
<input class = 'form-control w-50' type="email" name="email" required>
</div>
<div>
<label>Password<a style="color:red;">*</a>:</label>
<input class = 'form-control w-50' type="password" name="password" required>
</div>
<div>
  <label>Confirm Password<a style="color:red;">*</a>:</label>
  <input class = 'form-control w-50' type="password" name="repassword" required>
</div>
<div>
<label>Phone Number<a style="color:red;">*</a>:</label>
<input class = 'form-control w-50' type="Number" name="phnumber" required>
</div>
<div class ='text-center mt-3 w-50'>
<center><button class = 'btn btn-success' type = 'submit' value = 'submit' name= 'register'>Submit</button></center>
</div>
</div>
</div>
</form>
</div>
</body>
</html>