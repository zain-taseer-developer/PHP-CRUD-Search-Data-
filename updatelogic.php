<?php 
include('./dbconnect.php');
$idagai=$_GET['Updatesubmitbtn'];
// print_r($_GET['Updatesubmitbtn']);
if(isset($_GET['Updatesubmitbtn'])){

  $updatedstudentname = $_GET['updatedstudentname'];
  $updatedstudentcity =  $_GET['updatedstudentcity'];
  $updatedstudentattendence =  $_GET['updatedstudentattendence'];
  $updatedstudentcontact =  $_GET['updatedstudentcontact'];



$updateSql="UPDATE studentdata SET `sname`='$updatedstudentname',`scity`='$updatedstudentcity',`sattendence`='$updatedstudentattendence',`scontact`=$updatedstudentcontact WHERE sid=$idagai";

$resultupdate=mysqli_query($conn,$updateSql);
if($resultupdate){
  // echo "done hogya eii ";
  header('location:index.php?status=DataUpdatesuccess');
}else{

  // echo "not done eii";
  header('location:index.php?status=DataUpdateError');
}

}


?>
