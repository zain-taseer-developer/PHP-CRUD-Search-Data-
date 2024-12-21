<?php include('./dbconnect.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form That Collect Data</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- search data  -->
 <form action="./search.php" method="get" style="display:flex; flex-direction:row; justify-content:end;">
  <input type="text" name="searchInput">
  <button type="submit" name="searchbtn">Search Now</button>
 </form>
 
<!-- .................................................Form To Collect Data From Students  -->
  <h1 class="heading">Fill The Form Below </h1>
  <div class="formAlign">
  <form action="./insertit.php" method="get" > 
    <!-- <label for="">Student ID</label>
    <input type="number" name="studentid"> -->
    <label for="">Name</label>
    <input type="text" name="studentname">
    <label for="">City</label>
    <input type="text" name="studentcity">
    <label for="">Attendence</label>
    <input type="text" name="studentattendence">
    <label for="">Contact</label>
    <input type="tel" name="studentcontact"  min="0" max="12" required pattern="^\d{0,12}$">
    <button type="submit" name="submitbtn">Submit Data</button>
  </form>
  </div>
</body>
</html>

<!--   ................................    Data Extracted From Database  -->
<?php 

$sql="select * from studentdata";
$result=mysqli_query($conn,$sql);
// print_r($result);
if($result->num_rows>0){
  ?>
  
  <table border="1" cellpadding="5" cellspacing="0" width="80%" align="center" style="margin-top:50px">
    <t>
      <th>ID</th>
      <th>NAME</th>
      <th>CITY</th>
      <th>ATTENDENCE</th>
      <th>CONTACT</th>
      <th>Actions</th>
    </tr>
  <?php
  while($row=mysqli_fetch_assoc($result)){
    // print_r($row);
    ?>
    <tr>
      <td><?php echo $row['sid'] ?></td>
      <td><?php echo $row['sname'] ?></td>
      <td><?php echo $row['scity'] ?></td>
      <td><?php echo $row['sattendence'] ?></td>
      <td><?php echo $row['scontact'] ?></td>
      <td style="display: flex; gap:10px;">
      <form action="./update.php" method="get">
    <button name="updatebtn" value="<?php echo $row['sid']; ?>">Update</button>
      </form>
     <form action="./delete.php" method="get">
     <button name="deletebtn" value="<?php echo $row['sid']; ?>">Delete</button>
     </form>
     </td>
      
    </tr>
   


    <?php }
    ?>
</table>

<?php }
?>

<?php
// ................................ ...........  Data Actions Status
if (isset($_GET['status'])) {
  if ($_GET['status'] == 'success') {
      echo "<div class='responseTextsuccess'><p >Data inserted successfully!</p></div>";
  } elseif ($_GET['status'] == 'error') {
      echo "<p class='responseTexterr'>Failed to insert data. Please try again.</p>";
  }
}

if (isset($_GET['status'])) {
    if ($_GET['status'] == 'DataUpdatesuccess') {
        echo "<p class='responseTextsuccess'>Data Updated successfully!</p>";
    } elseif ($_GET['status'] == 'DataUpdateError') {
        echo "<p class='responseTextsuccess'>Failed to Update data. Please try again.</p>";
    }
}
if (isset($_GET['status'])) {
  if ($_GET['status'] == 'datadelsuccess') {
      echo "<p class='responseTextsuccess'>Data Deleted successfully!</p>";
  } elseif ($_GET['status'] == 'datadelerr') {
      echo "<p class='responseTexterr'>Failed to Delete data. Please try again.</p>";
  }
}
if (isset($_GET['status'])) {
  if ($_GET['status'] == 'Allfieldsrequired') {
      echo "<p class='responseTexterr'>All Fields Required , Please Fill Them Again</p>";
  }}

?>
