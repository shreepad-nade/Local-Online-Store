<?php
if($_POST){
require 's_db_key.php';
$conn = connect_db();
session_start();
if(isset($_POST['register']) ){
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordHashed = password_hash($password, PASSWORD_BCRYPT);
$phnumber = $_POST['phnumber'];
//sanitize your input
$name = mysqli_real_escape_string($conn, $name);
$email = mysqli_real_escape_string($conn, $email);
$passwordHashed = mysqli_real_escape_string($conn, $passwordHashed);
$phnumber=mysqli_real_escape_string($conn, $phnumber);
//check for existing record
$sql = "Select seller.email From seller Where email = '$email'";
$sql = $conn->query($sql);
$sql = $sql->fetch_assoc();
if($sql){
header('location: s_register.php');
exit();
}else{
$sql = "Insert Into seller (name, email, password,phnumber) VALUES ('$name', '$email', '$passwordHashed','$phnumber')";
$sql = $conn->query($sql);
if($sql){
$_SESSION['suc']="Registration successful";
header('location: s_index.php');
}
//$sql = $sql->fetch_assoc();
//echo $username.$email.$password.$phnumber;
}
}
else if(isset($_POST['login']) )
{
	$email = $_POST['email'];
	$password = $_POST['password'];
	$passwordHashed = password_hash($password, PASSWORD_BCRYPT);
	$sql = "Select * From seller Where email = '$email'";
	$sql = $conn->query($sql);
	if($sql)
	{
		$sql = $sql->fetch_assoc();
		if(password_verify($password, $sql['password']))
		{
			$_SESSION['email'] = $email;
			echo 'You have successfully logged-in';
			header('location: s_account.php');
			exit();
		}
		else
		{
			$_SESSION['er']="USER NAME OR PASSWORD INCORRECT";
			header('location: b_index.php');
		}
	}
	else
	{
		$_SESSION['er']="USER NAME OR PASSWORD INCORRECT";
		header('location: s_index.php');
		exit();
	}
}
}else{
header('location: s_index.php');
exit();
}
header('location: s_index.php');
?>