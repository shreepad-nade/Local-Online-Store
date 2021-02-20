<?php
	require 'b_db_key.php';

	$conn = connect_db();
	if(isset($_POST))
	{
		session_start();

		$email=$_SESSION['email'] ;
		$sql = "SELECT * FROM buyer where email='$email'"; 
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$u_id = $row["uid"];
		
		$p_id=$_POST['SUBMIT'];
		$sql = "SELECT * FROM products where pid='$p_id'"; 
		$result = $conn->query($sql) or die($conn->error); 
		$row = $result->fetch_assoc();
		$s_id = $row['sid'];

		//echo $uid."<br>";
		//echo $sid;

		//$p_name = mysqli_real_escape_string($conn, p_name);
		//$category = mysqli_real_escape_string($conn, $category);
		//$stock = mysqli_real_escape_string($conn, $stock);
		//$price=mysqli_real_escape_string($conn, $price);
		$s_id = mysqli_real_escape_string($conn, $s_id);
		$u_id = mysqli_real_escape_string($conn, $u_id);
		

		$sql = "Select pid From cart Where uid = '$u_id' and sid='$s_id' and pid='$p_id' and stat='0'";
		$sql = $conn->query($sql);
		$sql = $sql->fetch_assoc();
		if($sql)
		{ 
			echo 'Your Product is already registered!!!';	
			header('location: HOMEPAGE.php');
			exit();
		}
		else
		{
			$sql = "Insert Into cart (uid, sid, pid,qty,stat) VALUES ('$u_id', '$s_id','$p_id','1','0')";
			$sql = $conn->query($sql);
			if($sql)
			{
				echo "Registration successful. You may <a href= '/'>login</a> now";
				header('location: show_cart.php');
			}
		}

		/*$sql = "Select products.p_name From products Where p_name = '$p_name' and sid='$sid'";
		$sql = $conn->query($sql);
		$sql = $sql->fetch_assoc();
		if($sql)
		{ 
			echo 'Your Product is already registered!!!';	
		}
		else
		{
			$sql = "Insert Into cart (p_name, category, sid, price, stock) VALUES ('$p_name', '$category', '$sid','$price','$stock')";
			$sql = $conn->query($sql);
		}*/
		
		//session_start();
		//$_SESSION['cat']=$category;
		//echo $_SESSION['cat'];
		//header('location: b_retrive.php');
		//session_destroy();
	}
?>