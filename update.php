<?php 
include('./dbconnect.php');
// print_r($_GET['updatebtn']);
if($_GET['updatebtn']>0){
$updateForID=$_GET['updatebtn'];
$sql="select * from studentdata where sid=$updateForID";
$result=mysqli_query($conn,$sql);
// print_r($result);
$data=$result->fetch_assoc();
// print_r($data);
}
else{
  echo "error in id data"; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form That Collect Data</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1 class="heading">Update Your Informations </h1>
  <div class="formAlign">
  <form action="./updatelogic.php" method="get" > 
    <!-- <label for="">Student ID</label>
    <input type="number" name="studentid"> -->
    <label for="">Name</label>
    <input type="text" name="updatedstudentname" value="<?php echo $data['sname'] ?>">
    <label for="">City</label>
    <input type="text" name="updatedstudentcity" value="<?php echo $data['scity'] ?>">
    <label for="">Attendence</label>
    <input type="text" name="updatedstudentattendence" value="<?php echo $data['sattendence'] ?>">
    <label for="">Contact</label>
    <input type="text" name="updatedstudentcontact" value="<?php echo $data['scontact'] ?>">
    <button type="submit" name="Updatesubmitbtn" value="<?php echo $updateForID ?>">Update Data</button>
  </form>
  </div>
</body>
</html>

