<?php
if($_POST){
require 'b_db_key.php';
$conn = connect_db();
if(isset($_POST['register']) ){
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordHashed = password_hash($password, PASSWORD_BCRYPT);
$address = $_POST['address'];
//sanitize your input
$name = mysqli_real_escape_string($conn, $name);
$email = mysqli_real_escape_string($conn, $email);
$passwordHashed = mysqli_real_escape_string($conn, $passwordHashed);
$address=mysqli_real_escape_string($conn, $address);
//check for existing record
$sql = "Select buyer.email From buyer Where email = '$email'";
$sql = $conn->query($sql);
$sql = $sql->fetch_assoc();
if($sql){
header('location: b_register.php');
exit();
}else{
	session_start();
$sql = "Insert Into buyer (name, email, password,address) VALUES ('$name', '$email', '$passwordHashed','$address')";
$sql = $conn->query($sql);
if($sql){
	$_SESSION['suc']="Registration successful";
header('location: b_index.php');
}
//$sql = $sql->fetch_assoc();
//echo $username.$email.$password.$phnumber;
}
}
else if(isset($_POST['login']) )
{
	session_start();
	$email = $_POST['email'];
	$password = $_POST['password'];
	$passwordHashed = password_hash($password, PASSWORD_BCRYPT);
	$sql = "Select * From buyer Where email = '$email'";
	$sql = $conn->query($sql);
	if($sql)
	{
		$sql = $sql->fetch_assoc();
		if(password_verify($password, $sql['password']))
		{
			$_SESSION['email'] = $email;
			echo 'You have successfully logged-in';
			header('location: HOMEPAGE.php');
			exit();
		}
		else
		{
			$_SESSION['er']="USER NAME OR PASSWORD INCORRECT";
			header('location: b_index.php');
		}
	}else
	{
		//array_push($errors, "Username or password incorrect");  
		$_SESSION['er']="USER NAME OR PASSWORD INCORRECT";
		header('location: b_index.php');
		exit();
	}
}
}else{
header('location: b_index.php');
exit();
}
header('location: b_index.php');
?>