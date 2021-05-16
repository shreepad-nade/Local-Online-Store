<?php
if($_POST){

require 'b_db_key.php';
$conn = connect_db();

session_start();

if(isset($_POST['register']))
{	 

if(isset($_POST['register']) ){
$p_name = $_POST['p_name'];
$category = $_POST['category'];
$price = $_POST['price'];
$stock = $_POST['stock'];
//$image=$_POST['file'];

//$image = $_POST['image_p'];

/*if(isset($_POST['file']))
{
	echo 'a';
}*/

$email=$_SESSION['email'] ;
$sql = "SELECT * FROM seller where email='$email'"; 
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$sid = $row["sid"];

//echo $image;

//sanitize your input
$p_name = mysqli_real_escape_string($conn, $p_name);
$email = mysqli_real_escape_string($conn, $category);
$stock = mysqli_real_escape_string($conn, $stock);
$price=mysqli_real_escape_string($conn, $price);
$sid = mysqli_real_escape_string($conn, $sid);
//$image = mysqli_real_escape_string($conn, $image);

//check for existing record
$sql = "Select products.p_name From products Where p_name = '$p_name' and sid='$sid'";
$sql = $conn->query($sql);
$sql = $sql->fetch_assoc();
if($sql){ 
echo 'Your Product is already registered!!!';	
header('location: s_account.php');
exit();
}
else{




//echo $a;
$name = $_FILES['file']['name'];
  $target_dir = "upload/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
 
    // Convert to base64 
    $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
    $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
    // Insert record
  //  $query = "insert into images(image) values('".$image."')";
   // mysqli_query($con,$query);
  
    // Upload file
    //echo $target_dir.$name;
   // move_uploaded_file($_FILES['file']['tmp_name'],$target_dir);

/*$pid = "Select * from products where p_name = '$p_name' and sid='$sid'";
$pid = $conn->query($pid);
$pid1 = $pid->fetch_assoc();
$pid1=$pid1['pid'];
echo $pid1;
echo("Error description: " . $conn->error);

$sql1 = "Insert into image (pid,image) VALUES ('$pid1','".$image."')";
echo("Error description: " . $conn->error);
 mysqli_query($conn,$sql1);
//$sql1 = $conn->query($sql1) or die($sql1);
echo 'sd';*/

$sql = "Insert Into products (p_name, category, sid, price, stock, image) VALUES ('$p_name', '$category', '$sid','$price','$stock','".$image."')";
$sql = $conn->query($sql);
move_uploaded_file($_FILES['file']['tmp_name'],$target_dir);
echo("Error description: " . $conn->error);
if($sql ){
echo "Registration successful. You may <a href= '/'>login</a> now";
header('location: s_account.php');
}
else
{
	echo "Registration unsuccessful. You may <a href= '/'>login</a> now";

}
}
}	
}
}

else if(isset($_POST['update']))
{


$email=$_SESSION['email'] ;
$sql = "SELECT * FROM seller where email='$email'"; 
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$sid = $row["sid"];

$pid=$_POST['pid'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];
$sql="update products set stock='$quantity',price='$price' where pid='$pid'";
$sql=$conn->query($sql);
header('location: disp_products.php');

exit();
}

else if(isset($_POST['delete']))
{

$email=$_SESSION['email'] ;
$sql = "SELECT * FROM seller where email='$email'"; 
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$sid = $row["sid"];


$pid=$_POST['pid'];
$sql="delete from products where pid='$pid'";
$sql=$conn->query($sql);
header('location: disp_products.php');

exit();
}



}
?>