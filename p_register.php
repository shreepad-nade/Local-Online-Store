<?php
session_start();
require 'b_header.php';


?>
<head>
  
  
  <style >

    
    body 
    { 
       
           font-family:calibri, Helvetica, sanserif;
           background-color: grey;
           margin: 0px;
          padding: 0px;
          text-align: center;
            background-image: url("homemade.jpg");
            font-size: 15px;
            color: #000;
            font-family: sans-serif;
            font-weight: 300;
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
<center><div><h1 style="text-decoration-style: solid;">Register New Product</h1></div></center>

</div>
<form action = 'p_backend.php' method = 'POST' enctype='multipart/form-data'>
<div class = "container">
<div class="form-group">
<div>
  <label>Name of product:</label>
  <input class = 'form-control w-50' type="text" name="p_name" required>
</div>
<div>
  <br>
  <label for="category">Choose category of product:</label>
  <select id="category" name="category">
    <option value="Food">Food</option>
    <option value="Personal Care">Personal Care</option>
    <option value="Fashion">Fashion</option>
    <option value="Other">Other</option>
  </select><br>
</div>
<div>
<div>
  <label>Price of product:</label>
  <input class = 'form-control w-50' type="Number" name="price" required>
</div>
  <label>Available stock:</label>
  <input class = 'form-control w-50' type="Number" name="stock" required>
</div>
<input type='file' name='file'>
<div class ='text-center mt-3 w-50'>
<center><input class="btn btn-success" type = 'submit' value = 'submit' name='register'></center>
</div>
</div>
</div>
</form>
</div>
</body>
</html>