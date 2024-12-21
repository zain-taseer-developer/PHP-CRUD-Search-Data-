<?php 

include('./dbconnect.php');
print_r($_GET);
if(isset($_GET['submitbtn'])){
 
  // $studentid=$_GET['studentid'];
  $studentname=htmlspecialchars(trim($_GET['studentname']));
  $studentcity=htmlspecialchars(trim($_GET['studentcity']));
  $studentattendence=htmlspecialchars(trim($_GET['studentattendence']));
  $studentcontact=htmlspecialchars(trim($_GET['studentcontact']));
}
if(empty($studentname) || empty($studentcity) || empty($studentattendence) || empty($studentcontact)){
  header('location:index.php?status=Allfieldsrequired');
}else{
$sql="INSERT INTO `studentdata`(`sname`, `scity`, `sattendence`, `scontact`) VALUES ('$studentname','$studentcity','$studentattendence','$studentcontact')";

$result=mysqli_query($conn,$sql);
if($result){
header('location:index.php?status=success');
}
else{
  header('Location: index.php?status=error');
}
}
?>