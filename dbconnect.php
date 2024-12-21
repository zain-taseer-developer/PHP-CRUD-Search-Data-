<?php 
$host="localhost";
$username="root";
$password="";
$dbname="thenewcrud";

$conn=mysqli_connect($host,$username,$password,$dbname);
if($conn){
  // echo "connected successfully";
}else{
  echo "connection error".mysqli_connect_error();
}

?>