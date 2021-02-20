<?php
$sql_host="localhost";
$sql_username="root";
$sql_password='';
$sql_database="store";
function connect_db() {
global $sql_host, $sql_username, $sql_password, $sql_database;
$conn=mysqli_connect($sql_host,$sql_username,$sql_password);
if(mysqli_connect_error($conn) !== null) {
return false;
}
$conn -> select_db($sql_database);
return $conn;
}
?>