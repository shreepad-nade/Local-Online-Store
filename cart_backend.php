<?php
if($_POST){

require 'b_db_key.php';
$conn = connect_db();

session_start();
if(isset($_POST['update']))
{

$email=$_SESSION['email'] ;
$sql = "SELECT * FROM buyer where email='$email'"; 
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$uid = $row["uid"];

$pid=$_POST['pid'];
$quantity=$_POST['quantity'];

$sql="update cart set qty='$quantity' where pid='$pid' and uid='$uid'";
$sql=$conn->query($sql);
header('location: show_cart.php');

exit();
}

else if(isset($_POST['Dispatch']))
{
	$email=$_SESSION['email'] ;
$sql = "SELECT * FROM buyer where email='$email'"; 
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$uid = $row["uid"];


$str=$_POST['Dispatch'];
list($u_id,$p_id)=explode('.',$str);
$uid=(int)$u_id;
$pid=(int)$p_id;

$sql="update cart set stat=2 where uid='$uid' and pid='$pid' and stat=1";
$sql=$conn->query($sql);
header('location: s_pending_orders.php');

exit();
}	


else if(isset($_POST['Completed']))
{
	$email=$_SESSION['email'] ;
$sql = "SELECT * FROM buyer where email='$email'"; 
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$uid = $row["uid"];


$str=$_POST['Completed'];
list($u_id,$p_id)=explode('.',$str);
$uid=(int)$u_id;
$pid=(int)$p_id;

$sql="update cart set stat=3 where uid='$uid' and pid='$pid' and stat=2";
$sql=$conn->query($sql);
header('location: s_pending_orders.php');

exit();
}	


else if(isset($_POST['SUBMIT']))
{

$email=$_SESSION['email'] ;
$sql = "SELECT * FROM buyer where email='$email'"; 
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$uid = $row["uid"];


		$pid=$_POST['SUBMIT'];
$sql="delete from cart where pid='$pid' and uid='$uid'";
$sql=$conn->query($sql);
header('location: show_cart.php');

exit();
}
else if(isset($_POST['place_order']))
{
	$email=$_SESSION['email'] ;
	$sql = "SELECT * FROM buyer where email='$email'"; 
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$uid = $row["uid"];

	$sql="update cart set stat=1 where uid='$uid' and stat='0'";
	$result = $conn->query($sql);
	$sql="update cart set orderdate = getdate() where uid='$uid'";
	$result = $conn->query($sql);
	header('location: HOMEPAGE.php');
	
}
}
?>