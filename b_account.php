<?php
session_start();
if( !isset( $_SESSION['email']) ){
echo "You are not authorized to view this page. Go back <a href= '/'>home</a>";
exit();
}
require 'b_header.php';
require 'b_db_key.php';

?>
<body>
<nav class="navbar navbar-expand-sm bg-light mb-4">
<!-- Links -->
<ul class="navbar-nav ml-auto">
<li class="nav-item">
<a class="nav-link" href="b_logout.php">Logout</a>
</li>
</ul>
</nav>
<h1>Welcome to the Account Page, <?php echo $_SESSION['email'] ?></h1>

<?php 

$email=$_SESSION['email'] ;
echo $_SESSION['email'];
$sql = "SELECT * FROM buyer where email='$email'"; 
$conn=connect_db();
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$uid = $row["uid"];

echo $uid; 

?>

</body>
</html>