<?php 

include('./dbconnect.php');
if($_GET['deletebtn']>0){
  $delId= $_GET['deletebtn'];
  $delsql="DELETE FROM `studentdata` WHERE sid=$delId ";
  $resulttodel=mysqli_query($conn,$delsql);
  
if($resulttodel){
  header('location:./index.php?status=datadelsuccess');
}else{
  header('location:./index.php?status=datadelerr');
}
}


?>